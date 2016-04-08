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
    }
    
    private function parseUri($route){
        $uri = $this->uri;
        $route = explode('/', $route);
        $reg = "/^";
        $result['route'] = '';
        foreach ($route as $item){
            if($item) {
                if ($item{0} == ':') {
                    $reg = $reg . "\/(\w+)";
                    $result[substr($item, 1)] = 0;
                } else {
                    $reg = $reg . "\/" . $item;
                }
            }
        }
        $reg = $reg . ".?$/";
        preg_match($reg, $uri, $preg_result);
        if(count($preg_result)) {
            $i = 0;
            foreach ($result as $j => $r) {
                $result[$j] = $preg_result[$i];
                $i++;
            }
            return $result;
        }
        return $preg_result;
    }

    private function checkUri($route){
        $result = $this->parseUri($route);
        //print_r($result); // Array ( ) Array ( ) Array ( ) Array ( [route] => /list/page/12/222 [id] => 12 [test] => 222 )
        if(isset($result['route']))
            return $result;
        else
            return false;
    }
    
    public function addRoute($uriTemplate, $controllerName, $actionName, $httpMethod = 'get'){
        array_push($this->routes, [
            'uriTemplate' => $uriTemplate,
            'controllerName' => $controllerName,
            'actionName' => $actionName,
            'httpMethod' => $httpMethod
        ]);
    }

    public function getRoute(){
        foreach ($this->routes as $route){
            $res = $this->checkUri($route['uriTemplate']);
            if($res){
                return [
                    'control' => $route['controllerName'] . "Controller",
                    'action' => $route['actionName'] . "Action",
                    'data' => $res
                ];
            }
        }
        //если ничего не нашлось
        $uri = explode('/', $this->uri);
        //print_r($uri);
        $control = 'ErrorController';
        $action = 'error404Action';
        $data = [];
        foreach($uri as $i => $item){
            switch ($i){
                case 1 : $control = $item ? ucfirst($item) . "Controller" : "IndexController";
                    $action = 'indexAction';
                    break;
                case 2 :
                    $action = $item . "Action";
                    break;
                case 3 :
                    $data['id'] = $item;
                    break;
            }
        }
        return [
            'control' =>  $control,
            'action'  => $action,
            'data'    => $data
        ];
    }
}