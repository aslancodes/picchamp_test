<?php

App::uses('AppModel', 'Model');

class Test extends AppModel {

    public $name = 

    public function index() {
        $testUser = $this->Test->find('all');
        print_r($testUser);
    }
}