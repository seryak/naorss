<?php

namespace App\Feed;

use League\Plates\Engine;

class FeedGenerator
{
    public $itemCollections;
    public $rssContent;

    public function __construct($itemCollections)
    {
        $this->itemCollections = $itemCollections;
    }

    public function generate(): void
    {
        $templates = new Engine(__DIR__.'/../templates');
        $this->rssContent = $templates->render('rss', ['feed' => $this]);
        file_put_contents(__DIR__.'/../../rss.xml', $this->rssContent);
    }
}
