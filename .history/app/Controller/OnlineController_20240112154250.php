<?php


App::uses('AppController', 'Controller');


class OnlineController extends AppController{

    public function onlinechannel(){

    }   
    
    public function index() {

        //do this if ctp file is not present
        $this->autoRender = false;
        echo "hfnf";
	}
}

?>