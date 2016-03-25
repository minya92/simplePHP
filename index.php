<?php
session_start();
define('ROOT', realpath( dirname( __FILE__) ) . '/');

function page_loader($page = 'index'){
    $pages = ['index', 'login', '404', 'list'];
    if(isset($_SESSION['login']) && $_SESSION['login']){
        $match = false;
        foreach($pages as $p){
            if($page == $p){
                $match = true;
                break;
            }
        }
        if($match)
            include ROOT . 'app/controllers/' . $p . '.php';
        else
            include ROOT . 'app/controllers/404.php';
    } else {
        //echo "login";
        include ROOT . 'app/controllers/login.php';
    }
}

$page = isset($_GET['p']) ? $_GET['p'] : 'index';

page_loader($page);