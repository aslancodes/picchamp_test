<?php

App::uses('AppModel', 'Model');

class Test extends AppModel {

    public function index() {
        $testUser = $this->Ingredient->find('all');
    }
}