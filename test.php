<?php
$uri = '/list/page/8/43/';
$route = '/list/page/:page/:id/';
$route = explode('/', $route);
$reg = "/^";
foreach ($route as $item){
    if($item) {
        if ($item{0} == ':') {
            $reg = $reg . "\/(\w+)";
        } else {
            $reg = $reg . "\/" . $item;
        }
    }
}
$reg = $reg . ".$/";
//echo $reg2;
//$reg = "/^\/list\/page\/(\w+)\/(\w+).$/";
preg_match($reg, $uri, $mas);
print_r($mas);