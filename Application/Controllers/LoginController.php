<?php
/**
 * Created by PhpStorm.
 * User: lapsh
 * Date: 23.03.2016
 * Time: 0:33
 */
namespace SimplePHP\Application\Controllers;
use SimplePHP\Core\View\HtmlView;
use SimplePHP\Core\System\Request;

class LoginController {

    public function indexAction(){

        $Request = new Request();
        $req = $Request->request(['login', 'pass', 'logout']);

        if($req['login'] && $req['pass']){
            if($req['login'] == 'test' && $req['pass'] == 'test'){
                $_SESSION['login'] = 'test'; // todo сделать  модуль управления сессией
            }
            $host = $Request->getHost();
            $uri = $Request->getUriPath();
            header('Location: '. $host . $uri. '?p=index');
        } else {
            $View = new HtmlView();
            $View->setTemplate('login');
            $View->render();
        }

        if($req['logout']){
            unset($_SESSION['login']);
        }
    }
}
