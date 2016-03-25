<?php
/**
 * Created by PhpStorm.
 * User: lapsh
 * Date: 23.03.2016
 * Time: 0:33
 */

if(isset($_REQUEST['login']) && isset($_REQUEST['pass'])){
    $login = $_REQUEST['login'];
    $pass  = $_REQUEST['pass'];
    if($login == 'test' && $pass == 'test'){
        $_SESSION['login'] = 'test';
        include ROOT . "/app/views/index.phtml";
    } else {
        include ROOT . "/app/views/login.phtml";
    }
} else {
    include ROOT . "/app/views/login.phtml";
}

if(isset($_REQUEST['logout'])){
    unset($_SESSION['login']);
    echo "logout!";
}