<?php

namespace App\Model;

use App\Helpers\StringHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use VerbalExpressions\PHPVerbalExpressions\VerbalExpressions;

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

    /**
     * Категория
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoryModel(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category');
    }

    /**
     * ссылка на пост
     * @return string
     */
    public function getUrlAttribute(): string
    {
        return 'https://nao24.ru/'.$this->categoryModel->name.'/'.$this->id.'-'.$this->alt_name.'.html';
    }

    /**
     * Дополнительные опции из поста
     * @return array
     */
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

    /**
     * Вернет текст без подписи с фото
     * @return string
     */
    public function getTextWithoutFotoAttribute(): string
    {
        return StringHelper::cutBetween($this->full_story, '<b>', '</b>');
    }

}
