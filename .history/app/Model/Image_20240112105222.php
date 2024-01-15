

<?php
class Image extends AppModel {
    public $name = 'Image';

    public $validate = array(
        'file' => array(
            'rule' => 'notEmpty',
            'message' => 'Please upload a file'
        )
    );
    // public $actsAs = array(
    //     'Upload.Upload' => array(
    //         'file' => array(
    //             'fields' => array(
    //                 'dir' => 'dir'
    //             )
    //         )
    //     )
    // );
}
