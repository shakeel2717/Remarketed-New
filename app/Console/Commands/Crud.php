<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class Crud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {user} {crud}';

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
    public function handle()
    {
        $command = $this->argument('crud');
        $user = $this->argument('user');
        Artisan::call('make:model ' . ucfirst($command) . ' -mcr ');
        $filename = $command;
        if (!file_exists('resources/views/' . $user . '/' . $filename)) {
            mkdir('resources/views/' .  $user . '/' . $filename, 0777, true);
        }
        fopen("resources/views/$user/$filename/index.blade.php", "w") or die("Unable to Create file!");
        fopen("resources/views/$user/$filename/create.blade.php", "w") or die("Unable to Create file!");
        fopen("resources/views/$user/$filename/edit.blade.php", "w") or die("Unable to Create file!");
        fopen("resources/views/$user/$filename/show.blade.php", "w") or die("Unable to Create file!");
        $routeFile = file_get_contents('routes/web.php');
        $txt = "Route::resource('$filename', " . ucfirst($filename) . "Controller::class);";
        $replaced = Str::replace('r:', $txt, $routeFile);
        $capitalize = ucfirst($filename);
        $char = "\ " . $capitalize . "Controller;";
        $charReplace = Str::replace(' ', '', $char);
        $use = "use App\Http\Controllers" . $charReplace;
        $replaced = Str::replace('c:', $use, $replaced);
        $routeFile = fopen("routes/web.php", "w") or die("Unable to Open file!");
        fwrite($routeFile, $replaced);
        fclose($routeFile);
        return Command::SUCCESS;
    }
}
