<?php

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Input\InputOption;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


// Artisan::command('create:module {name}', function ($name) {
//     File::makeDirectory('app/Modules/' . $name, 0777, true, true);

//     $conetnt = `  
//     <?php

// namespace App\Modules\{$name}\Controllers;

// use App\Http\Controllers\Controller;

// class {$name}Controller extends Controller
// {
// }
//      `;

//     File::put('app/Modules/' . $name . '/' . $name . '.php', $conetnt);
// })->purpose('Display an inspiring quote');