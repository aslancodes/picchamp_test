<?php

App::uses('AppController', 'Controller');

class ClientController extends AppController {


    public function index(){
        $this->loadModel('Test');
        print_r($this->Test->find('all'));
    }
}