<?php 

// app/Controller/ImagesController.php
class ImagesController extends AppController {

    public $components = array(
        'RequestHandler',
        // ... other components
    );

    public $name = 'Images';

    public function index() {
        $this->set('images', $this->Image->find('all'));
        $this->set('images', $images);
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





    public function view(){
        $images = $this->Image->find('all');
        $this->set('images', $images);
    }

    public function delete($id) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $this->Image->id = $id;

        if (!$this->Image->exists()) {
            throw new NotFoundException(__('Invalid image'));
        }

        // Attempt to delete the image
        if ($this->Image->delete()) {
            $this->Session->setFlash('The image has been deleted.');
        } else {
            $this->Session->setFlash('Unable to delete the image. Please, try again.');
        }

        return $this->redirect(['action' => 'index']);
    }


    public function download($id) {
        $image = $this->Image->findById($id);

        if (!$image) {
            throw new NotFoundException(__('Invalid image'));
        }

        // Ensure that 'filename' is set in the image data
        if (!isset($image['Image']['filename'])) {
            throw new InternalErrorException(__('Invalid image data'));
        }

        $file = WWW_ROOT . 'img' . DS . 'images' . DS . $image['Image']['filename'];

        if (file_exists($file)) {
            $this->response->file($file, array('download' => true, 'name' => $image['Image']['filename']));
            return $this->response;
        } else {
            throw new NotFoundException(__('File not found'));
        }
    }


}
