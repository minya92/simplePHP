<?php
/**
 * Created by PhpStorm.
 * User: Work
 * Date: 15.04.2016
 * Time: 11:10
 */

namespace SimplePHP\Core\Exception;


class BaseException extends \Exception
{
    public function getType(){
        return 'error';
    }

    public function getMsg(){
        return 'Внутренние неполадки. 500';
    }
}