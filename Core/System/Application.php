<?php
namespace SimplePHP\Core\System;


class Application {

    public function run(){

        $Router = new Router();

        include ROOT .'Application/config/routes.php';

        $Route = $Router->getRoute();

        try{
            // todo сократить путь!
            $controllerClass = "SimplePHP\\Application\\Controllers\\" . $Route['control'];
            if(!preg_match("/^(\w+)$/", $Route['control']))
                throw new \UnexpectedValueException( 'Could not load library for class ');
            $Controller = new $controllerClass();
            $Controller->$Route['action']($Route['data']);

        } catch (\Exception $e){
            // todo вынести в конфиг
            $controllerClass = "SimplePHP\\Application\\Controllers\\ErrorController";
            $Controller = new $controllerClass();
            $Controller->error404Action();

        }

    }
}