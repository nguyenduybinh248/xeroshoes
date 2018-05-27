<?php

namespace App\Console;

use App\Console\Commands\CheckSale;
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
	    'App\Console\Commands\CheckSale',
	    'App\Console\Commands\SendCancelMail',
	    'App\Console\Commands\SendConfirmMail',
	    'App\Console\Commands\CheckQuantity',
	    'App\Console\Commands\CheckRate',
	    'App\Console\Commands\CheckProductStatus',
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
	    $schedule->command('check_sale')
		    ->everyMinute();
	    $schedule->command('send_confirm_emails')
		    ->everyMinute();
	    $schedule->command('send_cancel_mail')
		    ->everyMinute();
	    $schedule->command('check:quantity')
		    ->everyMinute();
	    $schedule->command('check:rate')
			    ->everyMinute();
	    $schedule->command('check:product_status')
		    ->everyMinute();
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
