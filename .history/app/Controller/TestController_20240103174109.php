<?php

App::uses('AppController', 'Controller');

class TestController extends AppController {

    // public function __construct() {
    //     $this->autoRender = false;
    // }

    $this->loadModel('Users');

    public function index() {

        echo "This is index";
    }

    public function view($id) {

        $this->autoRender = false;
        echo "This is view" . $id;
    }
}