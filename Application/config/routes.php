<?php
/**
 * @var \SimplePHP\Core\System\Router $Router
 */

//$Router->addRoute('/index', 'Index', 'index'); // url: GET /index/ -> IndexController->indexAction
//$Router->addRoute('/listerr', 'List', 'err'); // url: GET /listerr/ -> ListController->errAction
//$Router->addRoute('/list', 'List', 'index'); // url: GET /list/ -> ListController->indexAction
//$Router->addRoute('list/page/:id', 'List', 'page'); // url: GET sphp.ru/list/page/10 -> ListController->pageAction
$Router->addRoute('list/page/:id/:test', 'List', 'page'); // url: GET sphp.ru/list/page/10/100 -> ListController->pageAction