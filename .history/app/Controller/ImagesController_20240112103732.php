<?php 

CakePlugin::load('Upload');
// app/Controller/ImagesController.php
class ImagesController extends AppController {
    public $name = 'Images';

    public function index() {
        $this->set('images', $this->Image->find('all'));
    }

 
}
