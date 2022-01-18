<?php

namespace App\Feed;

use App\Model\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\DataTransferObject\DataTransferObject;

class OfficialCommentDTO extends DataTransferObject
{
    public $originName;
    public $origin;
    public $logo;
    public $anchor;
    public $yandexCommentText;
    public $yandexBindTo;

    public function createFromPost(Post $post)
    {
        $this->originName = $post->options['comment_name'];
        $this->origin = $post->options['comment_url'];
        $this->yandexCommentText = $post->options['comment_header'];
        $this->yandexBindTo = explode('!!!', $post->options['comment_binds']);
    }
}
