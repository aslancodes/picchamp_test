<?php

App::uses('AppModel', 'Model');

class Test extends AppModel {

    public function index() {
        $ingredients = $this->Ingredient->find('all');
    }
}