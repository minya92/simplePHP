<?php
$uri = '/list/page/8/43/te/';
$route = '/list/page/:page/:id/test/';
//echo $regexp = preg_replace('(\/(:*\/))', '\\\/${1}', $route);
//echo preg_replace('(:*\\\)', '11${1}', $regexp);
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
$reg = $reg . ".?$/";

//echo $reg;
//$reg = "/^\/list\/page\/(\w+)\/(\w+).$/";
//preg_match($reg, $uri, $mas);
//print_r($mas);

$test = [];
$test['z'] = 0;
$test['a'] = 0;
$test['a'] = 10;
$test['b'] = 0;
$test['c'] = 0;
print_r($test);