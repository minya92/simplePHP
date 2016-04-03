<?php
/**
 * Created by PhpStorm.
 * User: lapsh
 * Date: 03.04.2016
 * Time: 21:15
 */

namespace SimplePHP\Core\System;
use SimplePHP\Core\System\Request;

class Router
{
    private $controller, $action;

    /**
     * @var array
     */
    private $routes = [];

    private $uri;

    public function __construct(){
        $Request = new Request();
        $this->uri = $Request->getUri();

        //echo $this->uri;
        //print_r($this->routes);

        /**
         * если так /books/item/50 -> Books->item
         * то роуты не нужны
         */
    }

    public function addRoute($uriTemplate, $controllerName, $actionName, $httpMethod = 'get'){
        array_push($this->routes, [
            'uriTemplate' => $uriTemplate,
            'controllerName' => $controllerName,
            'actionName' => $actionName,
            'httpMethod' => $httpMethod
        ]);
    }

    public function getController(){
        //print_r($this->routes);
        foreach ($this->routes as $route){
            if($route['uriTemplate'] == $this->uri){
                return $route['controllerName'] . 'Controller';
            }
        }
        return 'ErrorController';
    }

    public function getAction(){
        foreach ($this->routes as $route){
            if($route['uriTemplate'] == $this->uri){
                return $route['actionName'] . 'Action';
            }
        }
        return 'error404Action';
    }
}