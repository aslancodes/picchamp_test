<?php

App::uses('AppController', 'Controller');

class ClientController extends AppController {


    public function index(){
        $this->autoRender = false;
        $this->loadModel('Client');
        print_r($this->Client->find('all'));
    }
    
}