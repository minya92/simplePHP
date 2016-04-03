<?php
/**
 * @var \SimplePHP\Core\System\Router $Router
 */

$Router->addRoute('/sphp/index', 'Index', 'index'); // url: GET /index/ -> IndexController->indexAction
$Router->addRoute('/sphp/listerr', 'List', 'err'); // url: GET /listerr/ -> ListController->errAction
$Router->addRoute('/sphp/list', 'List', 'index'); // url: GET /list/ -> ListController->indexAction
