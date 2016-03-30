<?php
namespace SimplePHP\Core\View;

class HtmlView extends BaseView {

    private $template;

    public function render(){

        ob_start(function($buffer){
            $data = $this->getData();
            if(is_array($data)){
                foreach($data as $i => $value){
                    $buffer = (str_replace("{{".$i."}}", $value, $buffer));
                }
            }
            return $buffer;
        });

        if(!file_exists( VIEWS . $this->template .'.phtml' )){
            // @todo что-то тут не так, надо сделать проще!
            (new \SimplePHP\Application\Controllers\ErrorController())
                ->fileNotFoundAction(VIEWS . $this->template .'.phtml');
            return;
        }

        include VIEWS . $this->template .'.phtml';

        ob_end_flush();
    }

    public function setTemplate( $template ){
        $this->template = $template;
    }
}