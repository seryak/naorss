<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'dle_post';

    public function categoryModel(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category');
    }

    public function getUrlAttribute()
    {
        return 'https://nao24.ru/'.$this->categoryModel->name.'/'.$this->id.'-'.$this->alt_name.'.html';
    }

}
