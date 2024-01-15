<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
<?php echo $this->Html->script('https://code.jquery.com/jquery-3.6.4.min.js'); ?>
    <script>
        $(document).ready(function() {
            $('#imageManagerOptions').hide();

            $('#imageManagerLink').click(function(e) {
                e.preventDefault();
                $('#imageManagerOptions').slideToggle();
            });
        });
    </script>

	<style>
		#navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

#navbar ul li {
    display: inline-block;
    position: relative;
}

#navbar ul ul {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

#navbar ul ul li {
    display: block;
}

#navbar ul li:hover > ul {
    display: block;
}
	</style>
</head>
<body>

<div id="header">
    <h2>Picchamp</h2>
</div>

<div id="navbar">
    <ul>
        <li><?php echo $this->Html->link('Clients', array('controller' => 'Client', 'action' => 'display')); ?></li>
        <li id="imageManagerLink">
            <?php echo $this->Html->link('Image Manager', '#'); ?>
            <ul id="imageManagerOptions">
                <li><?php echo $this->Html->link('View', array('controller' => 'pages', 'action' => 'view')); ?></li>
                <li><?php echo $this->Html->link('Download', array('controller' => 'pages', 'action' => 'download')); ?></li>
                <li><?php echo $this->Html->link('Search', array('controller' => 'pages', 'action' => 'search')); ?></li>
            </ul>
        </li>
    </ul>
</div>

<!-- <div id="content">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
</div> -->

</body>
</html>

