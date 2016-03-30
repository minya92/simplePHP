<?php
namespace SimplePHP\Application\Controllers;
use \SimplePHP\Core\View\HtmlView;

class ListController{

    public function indexAction(){

        $View = new HtmlView();
        $View->setData([
            'title' => 'Список страниц для редактирования'
        ]);
        $View->setTemplate('list');
        $View->render();
    }

}