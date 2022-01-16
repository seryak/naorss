<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use LaravelZero\Framework\Commands\Command;

class GenerateRSSCommand extends Command
{
    protected $signature = 'generate:rss';
    protected $description = 'Command description';

    public function handle()
    {
        echo DB::table('dle_post')->count();
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
