<?php

App::uses('AppController', 'Controller');

class ClientController extends AppController {


    public function index(){
        $this->loadModel('Client');
        // $clients = $this->Client->find('all');
        // $this->set('clients', $clients);
    }

}