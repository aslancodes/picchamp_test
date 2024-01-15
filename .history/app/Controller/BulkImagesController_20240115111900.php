
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php


class BulkImagesController extends AppController {


    public function upload(){
        getclients
    }

    public function getClientDetails() {
        // Check if the form is submitted
        if ($this->request->is('post')) {
            $clientId = $this->request->data['Client']['client_id'];
            $clientDetails = $this->Client->findById($clientId);
    
            if ($clientDetails) {
                $this->set('clientDetails', $clientDetails);
            } else {
                $this->Session->setFlash('Client not found.', 'default', array('class' => 'error'));
                $this->redirect(array('action' => 'index'));
            }
        } else {
            // Redirect to index if form is not submitted
            $this->redirect(array('action' => 'index'));
        }
    }
    

}