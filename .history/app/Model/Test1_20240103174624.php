<?php

App::uses('AppModel', 'Model');

class Test extends AppModel {

   // public $name = 'tests';

    public function index() {
        //print_r($this);die();
        $testUser = $this->find('all');
        print_r($testUser);
    }
}