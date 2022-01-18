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
        if (isset($dto->officialComment)) {
            $this->attributes['yandex:official-comment']['origin-name'] = $dto->officialComment->originName;
            $this->attributes['yandex:official-comment']['origin'] = $dto->officialComment->origin;
            $this->attributes['yandex:official-comment']['yandex-comment-text'] = $dto->officialComment->yandexCommentText;
            foreach ($dto->officialComment->yandexBindTo as $link) {
                $this->attributes['yandex:official-comment']['yandex:bind-to'][] = $link;
            }
        }
    }

    public function __toString()
    {
        $templates = new Engine(__DIR__.'/../templates');
        return $templates->render('item-rss', ['item' => $this]);
    }
}
