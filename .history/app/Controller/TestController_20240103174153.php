<?php

App::uses('AppController', 'Controller');

class TestController extends AppController {

    // public function __construct() {
    //     $this->autoRender = false;
    // }

    public function index() {

        $this->loadModel('Test');

        $this->

        echo "This is index";
    }

    public function view($id) {

        $this->autoRender = false;
        echo "This is view" . $id;
    }
}