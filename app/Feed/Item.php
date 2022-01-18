<?php

namespace App\Feed;

class Item
{
    public $attributes = [
        'title', 'link', 'description', 'category', 'pubDate', 'yandex:full-text'
    ];

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
        $attributesText = null;
        foreach ($this->attributes as $key => $attribute) {
            $attributesText = $attributesText.'<'.$key.'>'.$attribute.'</'.$key.'>'.PHP_EOL;
        }
        return <<<EOT
<item>
    '.$attributesText.'
</item>
EOT;
    }
}
