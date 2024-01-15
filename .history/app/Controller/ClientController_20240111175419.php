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

    public function search() {
        $searchTerm = $this->request->query('search');

        if ($searchTerm) {
            $conditions = array(
                'OR' => array(
                    'Client.name LIKE' => '%' . $searchTerm . '%',
                    'Client.bt_client_id LIKE' => '%' . $searchTerm . '%',
                    'Client.s3_folder_name LIKE' => '%' . $searchTerm . '%',
                    'Client.brand LIKE' => '%' . $searchTerm . '%',
                )
            );

            $client = $this->Client->find('all', array('conditions' => $conditions));
        } else {
            $client = array();
        }

        $this->set(compact('client', 'searchTerm'));
    }




}