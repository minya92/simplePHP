<?php
/**
 * Created by PhpStorm.
 * User: lapsh
 * Date: 13.04.2016
 * Time: 21:11
 */

namespace SimplePHP\Core\System;

class Helper
{
    /**
     * Проверка входных данных (аргументов) в контроллер
     * @param array $data Массив с данными
     * @param array $args Массив проверяемых аргументов
     * @return array
     */
    public static function checkArguments($data, $args = ['id']){
        $res = [];
        foreach ($args as $arg){
            if(isset($data[$arg]))
                $res[$arg] = $data[$arg];
            else
                $res[$arg] = null;
        }
        return $res;
    }

    /**
     * Перенаправление на другую страницу
     * Если начинается со '/' то перенаправление идет от корня сайта, иначе, относительно запроса
     * @param string $path 
     */
    public static function redirect($path = '/'){
        $Request = new Request();
        if ($path{0} == '/'){
            $uri = $Request->getHost() . $path;
        } else {
            $uri = $Request->getHost() . $Request->getUri() . '/' . $path;
        }
        header('Location: ' .$uri);
    }
}