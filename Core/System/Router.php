<?php
/**
 * Created by PhpStorm.
 * User: lapsh
 * Date: 03.04.2016
 * Time: 21:15
 */

namespace SimplePHP\Core\System;

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

        //<editor-fold desc="Составление регулярки для поиска и замены аргументов">
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
        //</editor-fold>

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
            $res = $this->parseUri($route['uriTemplate']);
            $res = isset($res['route']) ? $res : false;
            if($res){
                return [
                    'control' => $route['controllerName'] . "Controller",
                    'action' => $route['actionName'] . "Action",
                    'data' => $res
                ];
            }
        }

        //<editor-fold desc="Если такого маршрута не нашлось, пытаемся найти контрол по uri">
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
        //</editor-fold>
    }
}