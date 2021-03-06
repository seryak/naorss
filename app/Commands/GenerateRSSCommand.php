<?php

namespace App\Commands;

use App\Feed\FeedGenerator;
use App\Feed\ItemDTO;
use App\Feed\Item;
use App\Model\Category;
use App\Model\Post;
use League\Plates\Engine;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\DB;
use LaravelZero\Framework\Commands\Command;

class GenerateRSSCommand extends Command
{
    protected $signature = 'generate:rss';
    protected $description = 'Генерирует rss ленту для Яндекс';

    public function handle()
    {
//        $post = Post::find(26731);
////        $post = Post::find(29728);
//        dd($post->getDTO());

        $postCollection = Post::orderByDesc('date')->take(10000)->get();
        $feedItems = [];
        foreach ($postCollection as $post) {
            $itemFeed = new Item($post->getDTO());
            $feedItems[] = $itemFeed;
        }
        $feed = new FeedGenerator($feedItems);
        $feed->generate();
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
