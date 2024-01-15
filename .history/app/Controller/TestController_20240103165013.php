<?php

App::uses('AppController', 'Controller');

class TestController extends AppController {

    public function view() {

        $this->autoRender = false;
        echo "This is view";
    }
}