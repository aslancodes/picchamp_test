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

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Your CakePHP App</title>
    <!-- Add your CSS stylesheets and other head elements here -->
</head>
<body>

<div id="header">
    <h1>Your CakePHP App</h1>
</div>

<div id="navbar">
    <ul>
        <li><?php echo $this->Html->link('Home', array('controller' => 'pages', 'action' => 'display', 'home')); ?></li>
        <li><?php echo $this->Html->link('Image Manager', array('controller' => 'pages', 'action' => 'display', 'image_manager')); ?>
            <ul>
                <li><?php echo $this->Html->link('View', array('controller' => 'pages', 'action' => 'view')); ?></li>
                <li><?php echo $this->Html->link('Download', array('controller' => 'pages', 'action' => 'download')); ?></li>
                <li><?php echo $this->Html->link('Search', array('controller' => 'pages', 'action' => 'search')); ?></li>
            </ul>
        </li>
    </ul>
</div>

<div id="content">
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
</div>

</body>
</html>
</body>
</html>
