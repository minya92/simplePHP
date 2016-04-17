<?php
namespace SimplePHP\Core\View;

use SimplePHP\Core\Exception\NotFoundException;

class HtmlView extends BaseView {

    private $template;

    public function render(){

        $data = $this->getData();
        if(is_array($data)){
            extract($data);
        }

        ob_start();

        if(!file_exists( VIEWS . $this->template .'.phtml' )){
            $error_msg = "Файл шаблона не найден. " . VIEWS . $this->template .'.phtml';
            throw  new NotFoundException($error_msg);
        }

        include VIEWS . $this->template .'.phtml';

        ob_end_flush();
    }

    public function setTemplate( $template ){
        $this->template = $template;
        return $this;
    }
}