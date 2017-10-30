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
        Commands\SendSmsFourHour::class,
        Commands\SendSmsTwoHour::class,
        Commands\SendSmsOneHour::class,
        Commands\SendSmsOneDay::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //Send 4 sms per hour
        $schedule->command('send:smsFourHour')
            ->cron('15 0-23 * * * *');

        //Send 2 sms per hour
        $schedule->command('send:smsTwoHour')
            ->everyThirtyMinutes();

        //Send 1 sms per hour
        $schedule->command('send:smsOneHour')
            ->hourly();

        //Send 1 sms per day
        $schedule->command('send:smsOneDay')
            ->daily();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
