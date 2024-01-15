<?php

App::uses('AppController', 'Controller');
App::uses('TableRegistry', 'Model');

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
        $table = TableRegistry::get('clients');
        $records = $table->find();

        foreach ($records as $record) {
            # code...
            echo $record->name;
        }
    }
}