<?php
$uri = '/drgrgrg';
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
$reg = "/^\/(\w+)$/";
echo preg_match($reg, $uri, $mas);
//print_r($mas);