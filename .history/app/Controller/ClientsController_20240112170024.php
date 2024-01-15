
<?php
App::import('Vendor', 'PHPExcel/Classes/PHPExcel');
class ClientsController extends AppController {

public function beforeFilter() {
    parent::beforeFilter();
    $this->loadModel('Client');
}

public function index(){
    $clients = $this->Client->find('list');
    $this->set('clients', $clients);
}

public function add() {
    if($this->request->is('post')){
        $this->Client->create();
        if($this->Client->save($this->request->data)) {
            $this->Session->setFlash("Client has been created");
            $this->redirect('index');
        }
    }
}

public function search() {
    $searchTerm = $this->request->query('search');

    if ($searchTerm) {
        $conditions = array(
            'OR' => array(
                'name LIKE' => '%' . $searchTerm . '%',
                'bt_client_id LIKE' => '%' . $searchTerm . '%',
                's3_folder_name LIKE' => '%' . $searchTerm . '%',
                'brand LIKE' => '%' . $searchTerm . '%',
            )
        );

        $clients = $this->Client->find('all', array('conditions' => $conditions));
    } else {
        $clients = array();
    }

    $this->set(compact('clients', 'searchTerm'));
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
