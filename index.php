<?php

define('ROOT', realpath( dirname( __FILE__) ) . '/');

$page = isset($_GET['p']) ? $_GET['p'] : 'index';

switch ($page){
    case 'index' : 
        include ROOT . 'app/controllers/index.php';
        break;
    case 'login' :
        include ROOT . 'app/controllers/login.php';
        break;
    default :
        echo "404";
}