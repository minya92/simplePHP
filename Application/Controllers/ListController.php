<?php
namespace SimplePHP\Application\Controllers;
use \SimplePHP\Core\View\HtmlView;

class ListController{

    public function indexAction(){

        $View = new HtmlView();
        $View->setData([
            'title' => 'Список страниц',
            'test'  => 'Test Variable'
        ]);
        $View->setTemplate('list');
        $View->render();
    }

    public function errAction(){

        $View = new HtmlView();
        $View->setTemplate('listerr');
        $View->render();
    }

}