<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        'App\Console\Commands\StatisticalRequestCommand',
        'App\Console\Commands\StatisticalSensorCommand',
        'App\Console\Commands\StatisticalCounterCommand',
        'App\Console\Commands\LearningRequestCommand',
        'App\Console\Commands\LearningSensorCommand',
        'App\Console\Commands\SendAlertSensorEmailCommand'
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly(); //->everyFourHours(); // ->everyTwoHours(); // 
        $schedule->command('statistical:request')->everyTwoHours(); // ->twiceDaily(6, 8);
        $schedule->command('statistical:sensor')->everyTwoHours(); // ->twiceDaily(6, 8);
        $schedule->command('statistical:counter')->everyTwoHours(); // ->twiceDaily(6, 8);
        $schedule->command('learning:request')->everyFourHours(); // ->twiceDaily(6, 8);
        $schedule->command('learning:sensor')->everyFourHours(); // ->twiceDaily(6, 8);
        $schedule->command('alert:sensor')->everyTwoHours(); // ->twiceDaily(6, 8);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
