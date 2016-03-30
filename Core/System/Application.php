<?php
namespace SimplePHP\Core\System;
use SimplePHP\Application\Controllers as C;

class Application {

    public function run(){

        $page = isset($_GET['p']) ? $_GET['p'] : 'index';

        if(isset($_SESSION['login']) && $_SESSION['login']){
            switch( $page ){
                case 'index':
                    $IndexController = new C\IndexController();
                    $IndexController->indexAction();
                    break;

                case 'login':
                    $LoginController = new C\LoginController();
                    $LoginController->indexAction();
                    break;

                case 'list':
                    $ListController = new C\ListController();
                    $ListController->indexAction();
                    break;

                case 'listerr':
                    $ListController = new C\ListController();
                    $ListController->errAction();
                    break;

                default:
                    $ErrorController = new C\ErrorController();
                    $ErrorController->error404Action();
                    //echo '';
            }
        } else {
            $LoginController = new C\LoginController();
            $LoginController->indexAction();
        }
    }
}