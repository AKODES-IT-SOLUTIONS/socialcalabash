<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\User\TwitterController;
use App\Http\Controllers\User\FacebookController;
use App\Http\Controllers\User\InstagramController;
use App\Http\Controllers\User\PinterestController;
use App\Http\Controllers\User\LinkedinController;
use App\Models\SocialPost;
use App\Models\LinkedChannel;
use Carbon\Carbon;
use DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        DB::table('test')->insert([
            'name' => 'saad ' . Carbon::now(),
        ]);

        // $schedule->call(function () {
        //     dd("Runs after a minute");
        // })->everyMinute();
        // $schedule->command('inspire')->hourly();
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
