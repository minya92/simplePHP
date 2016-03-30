<?php
/**
 * Created by PhpStorm.
 * User: lapsh
 * Date: 23.03.2016
 * Time: 0:33
 */
namespace SimplePHP\Application\Controllers;
use SimplePHP\Core\View\HtmlView;
class LoginController {

    public function indexAction(){

        if(isset($_REQUEST['login']) && isset($_REQUEST['pass'])){
            $login = $_REQUEST['login'];
            $pass  = $_REQUEST['pass'];
            if($login == 'test' && $pass == 'test'){
                $_SESSION['login'] = 'test';
            }
            $uri = explode('/', $_SERVER['REQUEST_URI']);
            array_pop($uri);
            $uri= join('/', $uri);
            //echo $uri;
            header('Location: http://'.$_SERVER['HTTP_HOST']. $uri. '/?p=index');
        } else {
            $View = new HtmlView();
            $View->setTemplate('login');
            $View->render();
        }

        if(isset($_REQUEST['logout'])){
            unset($_SESSION['login']);
        }
    }
}
