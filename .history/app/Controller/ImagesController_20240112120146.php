<?php 

// app/Controller/ImagesController.php
class ImagesController extends AppController {


    public $name = 'Images';

    public function index() {
        $this->set('images', $this->Image->find('all'));
    }

    // public function add() {
    //     if ($this->request->is('post')) {
    //         $file = $this->request->data['Image']['file'];

    //         // Check if the file is not empty and is an image
    //         if (!empty($file['name']) && getimagesize($file['tmp_name'])) {
    //             // Read the file content
    //             $fileContent = file_get_contents($file['tmp_name']);

    //             // Save the file details to the database
    //             $this->Image->create();
    //             $this->request->data['Image']['filename'] = $fileContent;

    //             if ($this->Image->save($this->request->data)) {
    //                 $this->Session->setFlash('Image uploaded successfully.');
    //                 $this->redirect(array('action' => 'index'));
    //             } else {
    //                 $this->Session->setFlash('Unable to save image details to the database. Please, try again.');
    //             }
    //         } else {
    //             $this->Session->setFlash('Please upload a valid image file.');
    //         }
    //     }
    // }

    public function add() {
        if ($this->request->is('post')) {
            $file = $this->request->data['Image']['file'];
    
            // Check if the file is not empty and is an image
            if (!empty($file['name']) && getimagesize($file['tmp_name'])) {
                // Read the file content
                $fileContent = file_get_contents($file['tmp_name']);
    
                // Save the file details to the database
                $this->loadModel('Image'); // Load the Image model if not already loaded
                $this->Image->create();
                $this->Image->set(array(
                    'filename' => $fileContent,
                    'original_filename' => $file['name'],
                    'description' => $this->request->data['Image']['description'],
                    // Add any other fields you have in your Image model
                ));
    
                if ($this->Image->save()) {
                    $this->Session->setFlash('Image uploaded successfully.');
                    $this->redirect(['action' => 'index']);
                } else {
                    $this->Session->setFlash('Unable to save image details to the database. Please, try again.');
                }
            } else {
                $this->Session->setFlash('Please upload a valid image file.');
            }
        }
    }
}
