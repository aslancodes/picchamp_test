<!-- app/View/Images/add.ctp -->
<h2>Add Image</h2>

<?php echo $this->Form->create('Image', array('type' => 'file')); ?>
<?php echo $this->Form->input('file', array('type' => 'file')); ?>
<?php echo $this->Form->input('description'); ?>
<?php echo $this->Form->end('Upload'); ?>
