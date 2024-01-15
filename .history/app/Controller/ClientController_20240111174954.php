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
        $clients = $this->Client->find('list');
        $this->set('clients', $clients);

    }
    
    public function add() {
        $this->loadModel('Client');
        if($this->request->is('post')){
            $this->Client->create();
            if($this->Client->save($this->request->data)) {
                $this->Session->setFlash("client has been created");
                $this->redirect('index');
            }
        }
    }

}