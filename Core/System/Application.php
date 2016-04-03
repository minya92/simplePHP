<?php
namespace SimplePHP\Core\System;


class Application {

    public function run(){
        $Router = new Router();
        include ROOT .'Application/config/routes.php';

        $controllerClass = "SimplePHP\\Application\\Controllers\\" . $Router->getController();
        $actionName = $Router->getAction();

        $Controller = new $controllerClass();
        $Controller->$actionName();
    }
}