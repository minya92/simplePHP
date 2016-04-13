<?php
/**
 * Created by PhpStorm.
 * User: lapsh
 * Date: 23.03.2016
 * Time: 0:33
 */
namespace SimplePHP\Application\Controllers;

use SimplePHP\Core\View\HtmlView;
use SimplePHP\Core\View\JsonView;
use SimplePHP\Core\System\Request;
use SimplePHP\Core\System\Helper;

class LoginController
{

    public function indexAction()
    {
        if (!isset($_SESSION['login'])) {
            Helper::redirect('/list/page/19');
        } else {
            $View = new HtmlView();
            $View->setTemplate('login')->render();
        }
    }

    public function authAction()
    {
        $Request = new Request();
        $req = $Request->post(['login', 'pass']);

        if($req['login'] == 'test' && $req['pass'] == 'test') {
            $_SESSION['login'] = 'test';
            $data = [
                'success' => 'Login success!'
            ];
        } else {
            $data = [
                'error' => 'Login failed!'
            ];
        }

        $View = new JsonView();
        $View->setData($data);
        $View->render();
    }

    public function logoutAction()
    {
        $Request = new Request();
        $req = $Request->request(['logout']);
        if ($req['logout']) {
            unset($_SESSION['login']);
        }
    }
}
