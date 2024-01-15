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
                    $this->redirect(['action' => 'view']);
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

        $filename = $image['Image']['filename'];
        $file = WWW_ROOT . 'img' . DS . $filename;

        // Check if the file exists
        if (!file_exists($file)) {
            throw new NotFoundException(__('File not found'));
        }

        // Send the file as a response
        $this->response->file($file);

        // Provide a name for the downloaded file
        $this->response->download($filename);

        // Return the response object to initiate the download
        return $this->response;
    }




    public function downloadExcel() {
        // Load the PHPExcel library
        $this->PhpExcel = new PHPExcel();

        // Set the active Excel sheet to the first one
        $this->PhpExcel->setActiveSheetIndex(0);

        // Set the column names
        $this->PhpExcel->getActiveSheet()->setCellValue('A1', 'ID');
        $this->PhpExcel->getActiveSheet()->setCellValue('B1', 'Name');
        $this->PhpExcel->getActiveSheet()->setCellValue('C1', 'BT Client ID');
        $this->PhpExcel->getActiveSheet()->setCellValue('D1', 'S3 Folder Name');
        $this->PhpExcel->getActiveSheet()->setCellValue('E1', 'Created At');
        $this->PhpExcel->getActiveSheet()->setCellValue('F1', 'Brand');

        // Fetch data from the database
        $data = $this->Client->find('all');

        // Set the data in the Excel sheet
        $row = 2;
        foreach ($data as $record) {
            $this->PhpExcel->getActiveSheet()->setCellValue('A' . $row, $record['Client']['id']);
            $this->PhpExcel->getActiveSheet()->setCellValue('B' . $row, $record['Client']['name']);
            $this->PhpExcel->getActiveSheet()->setCellValue('C' . $row, $record['Client']['bt_client_id']);
            $this->PhpExcel->getActiveSheet()->setCellValue('D' . $row, $record['Client']['s3_folder_name']);
            $this->PhpExcel->getActiveSheet()->setCellValue('E' . $row, $record['Client']['created_at']);
            $this->PhpExcel->getActiveSheet()->setCellValue('F' . $row, $record['Client']['brand']);
            $row++;
        }

        // Create a new PHPExcel Writer
        $objWriter = PHPExcel_IOFactory::createWriter($this->PhpExcel, 'Excel5');

        // Set the headers to force download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="client_data.xls"');
        header('Cache-Control: max-age=0');

        // Write the Excel file to the output
        $objWriter->save('php://output');

        // Stop CakePHP from rendering the view
        $this->autoRender = false;
    }

}
