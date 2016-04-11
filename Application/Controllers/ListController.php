<?php
namespace SimplePHP\Application\Controllers;
use \SimplePHP\Core\View\HtmlView;
use SimplePHP\Core\View\JsonView;

class ListController{

    public function indexAction($test = 0){

        $View = new HtmlView();
        $View->setData([
            'title' => 'Список страниц',
            'test'  => 'Test Variable',
            'array' => ['one', 'two']
        ]);
        $View->setTemplate('list');
        $View->render();
    }

    public function pageAction($data = []){

        $View = new HtmlView();
        $View->setData([
        'title' => 'Редактирование страницы № ' . $data['id'],
            'test'  => 'Test Variable = ' . $data['test'],
            'array' => ['one', 'two']
        ]);
        $View->setTemplate('list_page');
        $View->render();
    }

    public function pageJSONAction($data = []){

        $View = new JsonView();
        $View->setData([
            'title' => 'Edit Page № ' . $data['id'],
            'test'  => 'Test Variable = ',
            'array' => ['one', 'two']
        ]);
        $View->render();
    }

    public function errAction(){

        $View = new HtmlView();
        $View->setTemplate('listerr');
        $View->render();
    }
}