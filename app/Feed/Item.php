<?php

namespace App\Feed;

use League\Plates\Engine;

class Item
{
    public $attributes = [];

    public function __construct(ItemDTO $dto)
    {
        $this->attributes['title'] = $dto->title;
        $this->attributes['link'] = $dto->link;
        $this->attributes['description'] = $dto->description;
        $this->attributes['category'] = $dto->category;
        $this->attributes['pubDate'] = $dto->pubDate;
        $this->attributes['yandex:full-text'] = $dto->fullText;
    }

    public function __toString()
    {
        $templates = new Engine(__DIR__.'/../templates');
        return $templates->render('item-rss', ['item' => $this]);
    }
}
