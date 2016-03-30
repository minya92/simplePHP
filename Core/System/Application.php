<?php
namespace SimplePHP\Core\System;
use SimplePHP\Application\Controllers as C;

class Application {

    public function run(){

        $page = isset($_GET['p']) ? $_GET['p'] : 'index';

//        function page_loader($page = 'index'){
//            $pages = ['index', 'login', '404', 'list'];
//            if(isset($_SESSION['login']) && $_SESSION['login']){
//                $match = false;
//                foreach($pages as $p){
//                    if($page == $p){
//                        $match = true;
//                        break;
//                    }
//                }
//                if($match)
//                    include ROOT . 'app/Controllers/' . $p . '.php';
//                else
//                    include ROOT . 'app/Controllers/ErrorController.php';
//            } else {
//                //echo "login";
//                include ROOT . 'app/Controllers/LoginController.php';
//            }
//        }
//
//        $page = isset($_GET['p']) ? $_GET['p'] : 'index';
//
//        page_loader($page);

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

            default:
                $ErrorController = new ErrorController();
                $ErrorController->error404Action();
                echo 'HTTP 404/1.0 Not Found';
        }

    }
}