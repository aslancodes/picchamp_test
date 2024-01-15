<?php

App::uses('AppController', 'Controller');

class TestController extends AppController {

    // public function __construct() {
    //     $this->autoRender = false;
    // }

    public function index() {

        echo "This is index";
    }

    public function view() {

        $this->autoRender = false;
        echo "This is view";
    }
}