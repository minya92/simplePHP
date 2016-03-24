<?php
session_start();

function page_loader($page = 'index'){
    $pages = ['index', 'login', '404', 'list'];
    if(isset($_SESSION['login']) && $_SESSION['login']){
        $match = false;
        foreach($pages as $p){
            if($page == $p)
                $match = true;
        }
        if($match)
            include ROOT . 'app/controllers/' . $p . '.php';
    } else {
        include ROOT . 'app/controllers/login.php';
    }
}

define('ROOT', realpath( dirname( __FILE__) ) . '/');

$page = isset($_GET['p']) ? $_GET['p'] : 'index';

switch ($page){
    case 'index' : 
        page_loader('index');
        break;
    case 'login' :
        page_loader('login');
        break;
    default :
        page_loader('404');
}