<?php 


// app/Controller/ImagesController.php
class ImagesController extends AppController {
    public $name = 'Images';

    public function index() {
        $this->set('images', $this->Image->find('all'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Image->create();

            $file = $this->request->data['Image']['file'];
            $uploadPath = 'img/uploads/';

            if ($this->Image->save($this->request->data)) {
                move_uploaded_file($file['tmp_name'], WWW_ROOT . $uploadPath . $file['name']);
                $this->Session->setFlash('Image uploaded successfully.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to upload image. Please, try again.');
            }
        }
    }
}
