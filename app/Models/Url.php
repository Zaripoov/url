<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    /**
     * Название таблицы
     * @var string
     */
    protected $table = 'urls';

    /**
     * Ввод данных пользователем
     * @var string[]
     */
    protected $fillable = [
        'url',
        'abbreviated_url',
    ];


    /**
     * Валидация url
     * @param $url
     * @return string|null
     */
    public function parse_url_if_valid($url)
    {

        // Массив с компонентами URL, сгенерированный функцией parse_url()
        $arUrl = parse_url($url);
        // Возвращаемое значение. По умолчанию будет считать наш URL некорректным.
        $ret = null;

        // Если не был указан протокол, или
        // указанный протокол некорректен для url
        if (!array_key_exists("scheme", $arUrl)
            || !in_array($arUrl["scheme"], array("http", "https")))
            // Задаем протокол по умолчанию - http
            $arUrl["scheme"] = "http";

        // Если функция parse_url смогла определить host
        if (array_key_exists("host", $arUrl) &&
            !empty($arUrl["host"]))
            // Собираем конечное значение url
            $ret = sprintf("%s://%s%s", $arUrl["scheme"],
                $arUrl["host"], $arUrl["path"]);

        // Если значение хоста не определено
        // (обычно так бывает, если не указан протокол),
        // Проверяем $arUrl["path"] на соответствие шаблона URL.
        else if (preg_match("/^\w+\.[\w\.]+(\/.*)?$/", $arUrl["path"]))
            // Собираем URL
            $ret = sprintf("%s://%s", $arUrl["scheme"], $arUrl["path"]);

        return $ret;
    }
}
