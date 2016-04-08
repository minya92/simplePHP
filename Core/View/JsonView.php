<?php
namespace SimplePHP\Core\View;

class JsonView extends BaseView {

    public function render(){
        $data = $this->getData();
        echo json_encode($data);
    }
}