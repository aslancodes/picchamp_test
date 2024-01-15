<?php

App::uses('AppController', 'Controller');

class ClientController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->loadModel('Client');
    }

    public function index(){
        $this->loadModel('Client');
        // $clients = $this->Client->find('all');
        // $this->set('clients', $clients);


    }

}