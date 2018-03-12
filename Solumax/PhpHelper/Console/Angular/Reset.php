<?php

namespace Solumax\PhpHelper\Console\Angular;

use Illuminate\Console\Command;

class Reset extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phpHelper:angular {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset Timestamp on Angular Templates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {

        if ($this->argument('action') == 'reset') {

            $angularManagement = new \Solumax\PhpHelper\App\AngularManagement\AngularManagementApp;
            $angularManagement->reset();
        }
    }

}
