<?php

namespace App\Console\Commands;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;
use Illuminate\Support\Str;

class GenerateModuleService
{
    private $modulePath = 'App\\Modules\\';
    private $exceptFoldersNames = ['Models'];

    protected $files;

    public function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    public function excute($argumentName)
    {
        if (!$this->files->exists($this->modulePath.$argumentName)) {
            foreach ($this->getStubsFilesPath($argumentName) as $key => $filePath) {
                $folderName = $this->getFolderName($filePath);

                if ($folderName != 'Database') {
                    $className = str_replace('{Class_Name}', $this->getSingularClassName($argumentName), $this->getFileName($filePath));

                    $full_path = $this->getFileFullPath($argumentName, $folderName, $className);

                    $this->makeDirectory(dirname($full_path));

                    $contents = $this->getSourceFile($argumentName, $filePath, $folderName);

                    $this->files->put($full_path, $contents);
                }
            }

            // create route File
            $routeStubFile = $this->getRouteStubFile();
            $routefull_path = $this->getRouteFileFullPath($argumentName);

            $this->makeDirectory(dirname($routefull_path));

            $routeFileContents = $this->getSourceFile($argumentName, $routeStubFile, 'Routes');
            $this->files->put($routefull_path, $routeFileContents);

            // create migrtion File
            $migrtionStubFile = $this->getMigrationsStubFile();
            $migrtionfull_path = $this->getMigrtionFileFullPath($argumentName);

            $this->makeDirectory(dirname($migrtionfull_path));

            $migrtionFileContents = $this->getSourceFile($argumentName, $migrtionStubFile, 'Database\\');
            $this->files->put($migrtionfull_path, $migrtionFileContents);

            return ['message' => 'Module : '.$argumentName.' created successfully.', 'success' => true];
        } else {
            return ['message' => 'Module : '.$argumentName.' already exits !', 'success' => false];
        }
    }

    private function getFolderName(string $filePath)
    {
        // convert file path to array and get folder name at index 4
        $arr = explode('/', $filePath);

        return $arr[4];
    }

    private function getFileName(string $filePath)
    {
        // convert file path to array and get last element in the array which is the class Name
        $arr = explode('/', $filePath);

        return last($arr);
    }

    private function getFileFullPath($argumentName, $stubFolder, $className)
    {
        return 'App\Modules\\'.$argumentName.'\\'
        .$this->getStubFolder($stubFolder).'\\'
        .$className;
    }

    private function getRouteFileFullPath($argumentName)
    {
        return base_path('routes\\Backend\\').$argumentName.'Routes.php';
    }

    private function getMigrtionFileFullPath($argumentName)
    {
        return 'App\Modules\\'.$argumentName.'\\Database\\'.date('Y_m_d_His').'_create_'.Str::lower($argumentName).'_table.php';
    }

    public function getSingularFolderName($name)
    {
        if (!in_array($name, $this->exceptFoldersNames)) {
            return ucwords(Pluralizer::singular($name));
        }
    }

    private function makeDirectory($path)
    {
        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    private function getSourceFile($argumentName, $stub, $folder)
    {
        $vars = [
        'namespace' => 'App\Modules\\'.$argumentName.'\\'.$folder,
        'Class_Name' => $this->getSingularClassName($argumentName),
        'ModulePath' => 'App\Modules\\'.$argumentName,
        'Model' => $this->getSingularClassName($argumentName),
        'modelVariable' => Str::camel($this->getSingularClassName($argumentName)),
        'Controller_Name' => $this->getSingularClassName($argumentName),
        'Module' => Str::lower($argumentName),
        'table_name' => Str::lower($argumentName),
        'database_file_name' => date('Y_m_d').'_'.time().'_'.Str::lower($argumentName),
       ];

        return $this->getStubContent($stub, $vars);
    }

    private function getStubContent($stub, $vars)
    {
        $contents = file_get_contents($stub);

        foreach ($vars as $search => $replace) {
            $contents = str_replace('{'.$search.'}', $replace, $contents);
        }

        return $contents;
    }

    private function getStubsFilesPath($name)
    {
        return glob('app/Console/Commands/custom_stubs/*/*');
    }

    private function getStubFolder(string $stubFilePath)
    {
        return last(explode('/', $stubFilePath));
    }

    private function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }

    private function getMigrationsStubFile()
    {
        return base_path('app\\Console\\Commands\\custom_stubs\\Database\\{database_file_name}.php');
    }

    private function getRouteStubFile()
    {
        return base_path('app\\Console\\Commands\\routes_stubs\\{RouteName}Routes.php');
    }
}