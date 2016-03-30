<?php
namespace SimplePHP\Application\Controllers;
use \SimplePHP\Core\View\HtmlView;

class IndexController{

    public function indexAction(){

        $View = new HtmlView();
        $View->setData([
            'title' => 'Это главная страничка'
        ]);
        $View->setTemplate('index');
        $View->render();
    }

}