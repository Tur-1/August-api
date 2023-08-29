<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(GenerateModuleService $generateModuleService)
    {
        $module = $generateModuleService->excute($this->argument('name'));

        if (!$module['success']) {
            return $this->error($module['message']);
        }

        return $this->info($module['message']);
    }
}
