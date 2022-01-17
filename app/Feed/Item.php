<?php

namespace App\Feed;

class Item
{
    public $attributes = [
        'title', 'link', 'description', 'category', 'pubDate', 'yandex:full-text'
    ];

    public function __construct(ItemDTO $dto)
    {

    }
}
