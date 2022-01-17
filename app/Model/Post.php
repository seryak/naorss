<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $categoryModel
 * @property $url
 * @property $title
 * @property $descr
 * @property $date
 * @property $full_story
 * @property array $options
 * @property mixed $xfields
 */
class Post extends Model
{
    protected $table = 'dle_post';

    public function categoryModel(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category');
    }

    public function getUrlAttribute(): string
    {
        return 'https://nao24.ru/'.$this->categoryModel->name.'/'.$this->id.'-'.$this->alt_name.'.html';
    }

    public function getOptionsAttribute(): array
    {
        $optionsRaw = explode('|', $this->xfields);
        $options = [];
        foreach ($optionsRaw as $key => $string) {
            if (strlen(trim($string)) == 0) {
                unset($optionsRaw[$key]);
            }
        }
        $optionsRaw = array_values($optionsRaw);
        foreach ($optionsRaw as $key => $string) {
            if ($key % 2 == 0) {
                $options[$string] = null;
            } else {
                $options[$optionsRaw[$key-1]] = $string;
            }
        }
        return $options;
    }

    public function getFullTextAttribute()
    {
        dd($this->full_story);
    }

}
