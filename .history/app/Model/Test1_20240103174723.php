<?php

App::uses('AppModel', 'Model');

class Test1 extends AppModel {

    //public $name = 'Test';

    public function index() {
        //print_r($this);die();
        $testUser = $this->find('all');
        print_r($testUser);
    }
}