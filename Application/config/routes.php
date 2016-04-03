<?php
/**
 * @var \SimplePHP\Core\System\Router $Router
 */

$Router->addRoute('/index', 'Index', 'index'); // url: GET /index/ -> IndexController->indexAction
$Router->addRoute('/listerr', 'List', 'err'); // url: GET /listerr/ -> ListController->errAction
$Router->addRoute('/list', 'List', 'index'); // url: GET /list/ -> ListController->indexAction
