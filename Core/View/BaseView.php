<?php
namespace SimplePHP\Core\View;

abstract class BaseView {

    private $data = null;

    abstract public function render();

    public function setData( $data ){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }
}