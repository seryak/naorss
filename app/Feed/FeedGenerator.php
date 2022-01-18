<?php

namespace App\Feed;

class FeedGenerator
{
    public $template;
    public $itemCollections;

    public function __construct($itemCollections)
    {
        $this->itemCollections = $itemCollections;
        $this->template = file_get_contents('rss-template.xml');
    }

    public function generate(): void
    {
        dd($this->itemCollections);
    }
}
