<?php

App::uses('AppController', 'Controller');
App::uses('TableRegistry', 'Model');
App::uses('ClassRegistry', 'Utility');

class TestController extends AppController {

    // public function __construct() {
    //     $this->autoRender = false;
    // }

    // public function index() {

    //     $this->loadModel('Test');

    //     $this->Test->index();

    //     echo "This is index";
    // }


    public function index($param1){
        
        $this->layout = 'customlayout';
        echo $param1;
       
    }

    public function view() {

       // $this->autoRender = false;

        $this->loadModel('Test');
        print_r($this->Test->find('all'));
        echo "This is view";
    }

    public function data(){
        $this->autoRender = false;
        $clientModel = ClassRegistry::init('Client');
    
        // Use the model to find records
        $records = $clientModel->find('all');
    
        foreach ($records as $record) {
            echo $record['Client']['name'];
        }
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Client->create();
            if ($this->Client->save($this->request->data)) {
                $this->Session->setFlash('Client has been saved.', 'flash/success');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add the client. Please try again.', 'flash/error');
            }
        }
    }
}