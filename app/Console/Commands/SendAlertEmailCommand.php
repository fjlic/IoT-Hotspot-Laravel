<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\AlertSensorMail;

class SendAlertEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:alert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Alert for Email of the Sensors';

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
        $mail = new AlertSensorMail;
        Mail::to('franc.javier.flores@gmail.com')->send($mail);
        return Command::SUCCESS;
    }
}
