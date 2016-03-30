<?php
namespace SimplePHP\Core\View;

class HtmlView extends BaseView {

    private $template;

    public function render(){
        ob_start();

        if( null === $data = $this->getData()){
//            throw ...
        }

        if(!file_exists( VIEWS . $this->template .'.phtml' )){
//            throw ...
        }

        include VIEWS . $this->template .'.phtml';

        $html = ob_get_clean();

        echo $html;
    }

    public function setTemplate( $template ){
        $this->template = $template;
    }
}