<?php
namespace SimplePHP\Core\System;


class Application {

    public function run(){

        $Router = new Router();

        include ROOT .'Application/config/routes.php';
        include ROOT .'Application/config/settings.php';

        $Route = $Router->getRoute();

        try{
            $controllerClass = "SimplePHP\\Application\\Controllers\\" . $Route['control'];
            if(!preg_match("/^(\w+)$/", $Route['control']))
                throw new \UnexpectedValueException( 'Could not load library for class!!!!!');
            $Controller = new $controllerClass();
            $Controller->$Route['action']($Route['data']);

        } catch (\Exception $e){
            if(isset($ERROR_404_CONTROLLER_NAME) && isset($ERROR_404_ACTION_NAME)){
                $controllerClass = "SimplePHP\\Application\\Controllers\\" . $ERROR_404_CONTROLLER_NAME;
                $Controller = new $controllerClass();
                $Controller->$ERROR_404_ACTION_NAME();
            }
            else
                echo $e;
        }
    }
}