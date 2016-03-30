<?php
session_start();
define('ROOT', realpath( dirname( __FILE__) ) . '/');
define('VIEWS', ROOT .'Application/views/');

try {
    require_once ROOT .'Core/Autoloader.php';

    $Application = new \SimplePHP\Core\System\Application();
    $Application->run();
}
catch(\Exception $E ){
    echo '<pre><b>Exception catched:</b> ' . $E->getMessage()
        . '<br /><br />In <u>' . $E->getFile()
        . '</u>, at line <b>#' . $E->getLine()
        . '</b><br /><br />' . $E->getTraceAsString() . '</pre>';
}