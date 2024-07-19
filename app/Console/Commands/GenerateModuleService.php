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

    public function excute($moduleName)
    {
        if (!$this->files->exists($this->modulePath . $moduleName)) {
            foreach ($this->getStubsFilesPath($moduleName) as $key => $filePath) {
                $folderName = $this->getFolderName($filePath);

                if ($folderName != 'Database') {
                    $className = str_replace('{Class_Name}', $this->getSingularClassName($moduleName), $this->getFileName($filePath));

                    $full_path = $this->getFileFullPath($moduleName, $folderName, $className);

                    $this->makeDirectory(dirname($full_path));

                    $contents = $this->getSourceFile($moduleName, $filePath, $folderName);

                    $this->files->put($full_path, $contents);
                }
            }



            // create migrtion File
            $migrtionStubFile = $this->getMigrationsStubFile();
            $migrtionfull_path = $this->getMigrtionFileFullPath($moduleName);

            $this->makeDirectory(dirname($migrtionfull_path));

            $migrtionFileContents = $this->getSourceFile($moduleName, $migrtionStubFile, 'Database\\migrations');
            $this->files->put($migrtionfull_path, $migrtionFileContents);

            // create migrtion File
            $FacatoryStubFile = $this->getFacatoryStubFile();
            $Facatoryfull_path = $this->getFacatoryFileFullPath($moduleName);

            $this->makeDirectory(dirname($Facatoryfull_path));

            $FacatoryFileContents = $this->getSourceFile($moduleName, $FacatoryStubFile, 'Database\\factories');
            $this->files->put($Facatoryfull_path, $FacatoryFileContents);


            // create migrtion File
            $SeederStubFile = $this->getSeederStubFile();
            $Seederfull_path = $this->getSeederFileFullPath($moduleName);

            $this->makeDirectory(dirname($Seederfull_path));

            $SeederFileContents = $this->getSourceFile($moduleName, $SeederStubFile, 'Database\\seeders');
            $this->files->put($Seederfull_path, $SeederFileContents);

            return ['message' => 'Module : ' . $moduleName . ' created successfully.', 'success' => true];
        } else {
            return ['message' => 'Module : ' . $moduleName . ' already exits !', 'success' => false];
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

    private function getFileFullPath($moduleName, $stubFolder, $className)
    {
        return 'App\Modules\\' . $moduleName . '\\'
            . $this->getStubFolder($stubFolder) . '\\'
            . $className;
    }

    private function getMigrtionFileFullPath($moduleName)
    {
        return 'App\Modules\\' . $moduleName . '\\Database\\migrations\\' . date('Y_m_d_His') . '_create_' . Str::snake(Str::plural($moduleName)) . '_table.php';
    }

    private function getFacatoryFileFullPath($moduleName)
    {
        return 'App\Modules\\' . $moduleName . '\\Database\\factories\\' . $this->getSingularClassName($moduleName) . 'Factory.php';
    }
    private function getSeederFileFullPath($moduleName)
    {
        return 'App\Modules\\' . $moduleName . '\\Database\\seeders\\' . $this->getSingularClassName($moduleName) . 'Seeder.php';
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

    private function getSourceFile($moduleName, $stub, $folder)
    {
        $vars = [
            'namespace' => 'App\Modules\\' . $moduleName . '\\' . $folder,
            'Class_Name' => $this->getSingularClassName($moduleName),
            'ModulePath' => 'App\Modules\\' . $moduleName,
            'Model' => $this->getSingularClassName($moduleName),
            'modelVariable' => Str::camel($this->getSingularClassName($moduleName)),
            'Controller_Name' => $this->getSingularClassName($moduleName),
            'Module' => Str::lower($moduleName),
            'table_name' => Str::snake(Str::plural($moduleName)),
            'database_file_name' => date('Y_m_d') . '_' . time() . '_' . Str::snake(Str::plural($moduleName)),
        ];

        return $this->getStubContent($stub, $vars);
    }

    private function getStubContent($stub, $vars)
    {
        $contents = file_get_contents($stub);

        foreach ($vars as $search => $replace) {
            $contents = str_replace('{' . $search . '}', $replace, $contents);
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
        return base_path('app\\Console\\Commands\\custom_stubs\\Database\\migrations\\{database_file_name}.php');
    }

    private function getFacatoryStubFile()
    {
        return base_path('app\\Console\\Commands\\custom_stubs\\Database\\factories\\{Model}Factory.php');
    }
    private function getSeederStubFile()
    {
        return base_path('app\\Console\\Commands\\custom_stubs\\Database\\seeders\\{Model}Seeder.php');
    }
}
