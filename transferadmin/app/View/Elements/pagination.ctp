<?php
/**
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2013 Social network.
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="pagingNavi">
	<ul>					
	  <li class="prev">
		<?php echo $this->Paginator->prev('');?>
	  </li>
	  <?php echo $this->Paginator->numbers(array("tag"=>"li","separator"=>"", "class"=>"fg-button ui-button")); ?>
	  <li class="next">
		<?php echo $this->Paginator->next('');?>
	  </li>
	</ul>
</div>
