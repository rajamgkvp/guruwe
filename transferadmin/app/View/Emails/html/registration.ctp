<?php
/**
 * Project			:		IM-CARE
 * Created by		:		Sandeep Panwar
 * Copyright 2012 IM-CARE.
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2012 IM-CARE.
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php echo $this->element('email_header'); ?>
<strong>Dear <?php echo ucwords($User)?>,</strong> <br /><br />
You are successfully registered with us. We are really happy to have you as a member of our community.
<br /><br />
Your email address:<a href="mailto:<?php echo $email;?>"><?php echo $email;?></a><br /><br />
The next time you visit <?php echo SITE_URL;?> simply click on "log in" to use registered features.
<?php echo $this->element('email_footer'); ?>