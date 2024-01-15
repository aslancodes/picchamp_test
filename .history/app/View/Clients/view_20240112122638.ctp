<!-- app/View/Images/view.ctp -->

<h2>View Image</h2>

<?php
if (isset($image['Image']['filename'])) {
    echo $this->Html->image(['controller' => 'images', 'action' => 'display', $image['Image']['id']]);
} else {
    echo 'No image found.';
}
?>
