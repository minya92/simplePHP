<?php
/**
 * Created by PhpStorm.
 * User: minya92
 * Date: 30.03.2016
 * Time: 11:20
 */

namespace SimplePHP\Core\System;


class Request
{
    function __construct(){

    }

    private function _filter($field, $method = 'request'){
        switch ($method){
            case 'request' :
                return isset($_REQUEST[$field]) ? $_REQUEST[$field] : null;
            case 'post' :
                return isset($_POST[$field]) ? $_POST[$field] : null;
            case 'get' :
                return isset($_GET[$field]) ? $_GET[$field] : null;
        }
    }

    private function _request($fields, $method = 'request'){
        $result = [];
        if(is_array($fields)){
            foreach($fields as $field){
                $result[$field] =  $this->_filter($field, $method);
            }
        } elseif($fields){
            $result[$fields] =  $this->_filter($fields, $method);
        }
        return $result;
    }

    public function request($fields){
        return $this->_request($fields, 'request');
    }

    public function post($fields){
        return $this->_request($fields, 'post');
    }

    public function get($fields){
        return $this->_request($fields, 'get');
    }

    /*
     * Получить uri путь до исполняемого скрипта например:
     * http://test.ru/page/one/1.php => /page/one/
     * http://test.ru/1.php => /
     */
    public function getUriPath(){
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        array_pop($uri);
        $uri= join('/', $uri);
        return $uri . '/';
    }

    public function getHost(){
        return 'http://'.$_SERVER['HTTP_HOST']; // todo добавить SSL
    }
}