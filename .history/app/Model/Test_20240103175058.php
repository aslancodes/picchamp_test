<?php

App::uses('AppModel', 'Model');

class Test1 extends AppModel {

    //public $name = 'Test';

    public function index() {
        //print_r($this);die();
        $testUser = $this->find('all');
        echo "<pre>";
        print_r($testUser);
        echo "</pre>";
    }
}