<?php
namespace SimplePHP\Core\System;


class Debug {

    private $message;

    public function resolve(\Exception $E, $hard_err = false){
        $type = $hard_err ? 'hard' : $E->getType();
        $msg = 'Неизвестная ошибка!';
        switch ($type){
            case 'hard' : $msg = 'Внутренние неполадки. 500'; break;
            case 'error': $msg = $E->getMsg(); break;
            case '404'  : $msg = $E->getMsg(); break;
        }

        $this->message = '<pre><b>Exception catched:</b> ' . $E->getMessage()
            . '<br /><br />In <u>' . $E->getFile()
            . '</u>, at line <b>#' . $E->getLine()
        . '</b><br /><br />' . $E->getTraceAsString() . '</pre>';
        
        if(DEBUG){
            echo $this->message;
        }
        else {
            $controllerClass = "SimplePHP\\Application\\Controllers\\" . ERROR_CONTROLLER_NAME;
            $Controller = new $controllerClass();
            $Action = ERROR_ACTION_NAME;
            $Controller->$Action($msg);
        }
    }

}