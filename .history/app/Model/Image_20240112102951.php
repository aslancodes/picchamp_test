

<?php
class Image extends AppModel {
    public $name = 'Image';

    public $validate = array(
        'file' => array(
            'rule' => array('extension', array('jpg', 'jpeg', 'png', 'gif')),
            'message' => 'Please upload a valid image file'
        )
    );

    public $actsAs = array(
        'Upload.Upload' => array(
            'file' => array(
                'fields' => array(
                    'dir' => 'dir'
                )
            )
        )
    );
}
