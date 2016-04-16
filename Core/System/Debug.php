<?php
namespace SimplePHP\Core\System;

use SimplePHP\Core\Exception\BaseException;
use SimplePHP\Core\Exception\NotFoundException;

class Debug {

    private $message;

    public function resolveByType(NotFoundException $E){
        $this->message = '<pre><b>Exception catched:</b> ' . $E->getMessage()
            . '<br /><br />In <u>' . $E->getFile()
            . '</u>, at line <b>#' . $E->getLine()
            . '</b><br /><br />' . $E->getTraceAsString() . '</pre>';

        if(DEBUG){
            echo '<pre> ' .$this->message. '</pre>';
        }
        else {
            //@todo что-то не работает  
            (new \SimplePHP\Application\Controllers\ErrorController())
                ->fileNotFoundAction($E->getMessage());
        }
    }

    public function resolve(BaseException $E){
        $this->message = '<pre><b>Exception catched:</b> ' . $E->getMessage()
            . '<br /><br />In <u>' . $E->getFile()
            . '</u>, at line <b>#' . $E->getLine()
        . '</b><br /><br />' . $E->getTraceAsString() . '</pre>';
        
        if(DEBUG){
            $this->message;
        }
        else {
            $this->show();
        }
    }

    public function show($message = false){
        if(!$message)
            $message = $this->message;
        if(DEBUG){
            echo '<pre> ' .$this->message. '</pre>';
        } else {
            if(isset($ERROR_CONTROLLER_NAME) && isset($ERROR_404_ACTION_NAME)){
                $controllerClass = "SimplePHP\\Application\\Controllers\\" . $ERROR_CONTROLLER_NAME;
                $Controller = new $controllerClass();
                $Controller->$ERROR_404_ACTION_NAME();
            } else
                echo "Настройте приложение в файле settings.php";
        }
    }

}