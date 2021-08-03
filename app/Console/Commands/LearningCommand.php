<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class LearningCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sample:learning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command consolidate the sample for linear regression';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return 0;
    }
}
