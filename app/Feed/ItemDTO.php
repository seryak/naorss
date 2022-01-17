<?php

namespace App\Feed;

use App\Model\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\DataTransferObject\DataTransferObject;

class ItemDTO extends DataTransferObject
{
    public $title;
    public $link;
    public $description;
    public $category;
    public $pubDate;
    public $fullText;
    public $officialComment = null;

    public function createFromPost(Post $post)
    {
        $this->title = $post->title;
        $this->link = $post->url;
        $this->description = Str::limit($post->descr, 130);
        $this->category = $post->categoryModel->name;
        $this->pubDate = Carbon::parse($post->date)->toDayDateTimeString();
        $this->fullText = $post->full_story;
    }
}
