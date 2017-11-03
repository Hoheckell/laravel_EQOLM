<?php

namespace App\Console\Commands;

use App\Jobs\ProcessFile;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportFilesCommand extends Command
{


    protected $param;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct($param = 0)
    {
        parent::__construct();
        $this->param = $param;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

    }
}
