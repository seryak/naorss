<?php

namespace App\Commands;

use App\Feed\ItemDTO;
use App\Model\Category;
use App\Model\Post;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use LaravelZero\Framework\Commands\Command;

class GenerateRSSCommand extends Command
{
    protected $signature = 'generate:rss';
    protected $description = 'Command description';

    public function handle()
    {
        $post = Post::find(26731);
        $post->options;
        dd($post->full_text);
        $dto = new ItemDTO();
        $dto->createFromPost($post);
        dd($dto);
        dd(DB::table('dle_post')->first());
        dd($dto);
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
