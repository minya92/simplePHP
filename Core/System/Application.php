<?php
namespace SimplePHP\Core\System;


class Application {

    public function run(){

        $Router = new Router();

        include ROOT .'Application/config/routes.php';

        $Route = $Router->getRoute();

        // todo сократить путь!
        $controllerClass = "SimplePHP\\Application\\Controllers\\" . $Route['control'];

        $Controller = new $controllerClass();

        $Controller->$Route['action']($Route['data']);
    }
}