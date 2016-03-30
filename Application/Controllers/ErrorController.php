<?php
/**
 * Created by PhpStorm.
 * User: lapsh
 * Date: 23.03.2016
 * Time: 0:33
 */
namespace SimplePHP\Application\Controllers;
use SimplePHP\Core\View\HtmlView;

class ErrorController{

    private function init(){
        $View = new HtmlView();
        $View->setTemplate('error');
        return $View;
    }

    public function fileNotFoundAction($file){
        $View = $this->init();
        $View->setData([
            'error' => 'Файл: <b>' . $file .'</b> не найден!'
        ]);
        $View->render();
    }

    public function indexAction(){
        $View = $this->init();
        $View->setData([
            'error' => 'Ошибка =('
        ]);
        $View->render();
    }

    public function error404Action(){
        $View = $this->init();
        $View->setData([
            'error' => 'Ошибка 404. Страница не найдена!'
        ]);
        $View->render();
    }
}