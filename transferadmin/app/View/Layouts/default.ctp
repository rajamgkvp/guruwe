<?php
/**
 *
 * PHP 5
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
		<?php echo $this->element('head'); ?>
</head>
<body>

<?php echo $this->element('header'); ?>


<div class="container">
<!-- wrapper for the whole component -->
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>

<!-- Start Footer --> 
<?php echo $this->element('footer'); ?>
<!-- End Footer --> 
</div>

<?php echo $this->element('footer_js'); ?>

<?php //echo $this->element('sql_dump'); ?>
</body>
</html>