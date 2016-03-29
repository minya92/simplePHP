<?php
namespace SimplePHP\Controllers;
use \SimplePHP\Core\View\HtmlView;

class IndexController{

    public function indexAction(){

        $View = new HtmlView();
        $View->setData('fkfkfk');
        return $View->render();
    }

}