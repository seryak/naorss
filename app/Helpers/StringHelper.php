<?php

namespace App\Helpers;

class StringHelper
{
    /**
     * Ищет подстроку между строками
     * @param $string - исходный текст
     * @param $start - начало строка
     * @param $end - конец строка
     * @return false|string - подстрока
     */
    public static function getBetween($string, $start, $end) {
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    /**
     * Вырезает подстроку между строк из исходного текста
     * @param $string
     * @param $start
     * @param $end
     * @return string
     */
    public static function cutBetween($string, $start, $end): string
    {
        $substring = $start.self::getBetween($string, $start, $end).$end;
        return str_replace($substring, '', $string);
    }
}
