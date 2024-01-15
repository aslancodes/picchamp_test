<?php 

// CakePlugin::load('Upload');
// app/Controller/ImagesController.php
class ImagesController extends AppController {
    public $name = 'Images';

    public function index() {
        $this->set('images', $this->Image->find('all'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $file = $this->request->data['Image']['file'];

            // Check if the file is not empty and is an image
            if (!empty($file['name']) && getimagesize($file['tmp_name'])) {
                // Set the upload path
                $uploadPath = 'img/uploads/';

                // Create a unique filename
                $filename = uniqid() . '_' . $file['name'];

                // Move the uploaded file to the upload path
                move_uploaded_file($file['tmp_name'], WWW_ROOT . $uploadPath . $filename);

                // Save the file details to the database
                $this->Image->create();
                $this->request->data['Image']['filename'] = $filename;

                if ($this->Image->save($this->request->data)) {
                    $this->Session->setFlash('Image uploaded successfully.');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash('Unable to save image details to the database. Please, try again.');
                }
            } else {
                $this->Session->setFlash('Please upload a valid image file.');
            }
        }
    }
}
