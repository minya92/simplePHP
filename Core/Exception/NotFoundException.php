<?php

namespace SimplePHP\Core\Exception;


class NotFoundException extends BaseException
{
    public function getType(){
        return '404';
    }

    public function getMsg(){
        return 'Запрошенный url не найден. 404';
    }
}