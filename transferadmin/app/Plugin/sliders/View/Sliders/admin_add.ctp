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


<div class="content">
    <div class="title"><h5>Manage Sliders</h5></div>
<!-- Main wrapper -->
<div class="wrapper" style="margin-top:15px;">
<div class="content" id="container">

<?php echo $this->Form->create(null ,array('url'=>'/admin/sliders/sliders/add/', 'enctype'=>'multipart/form-data', 'class'=>'mainForm')); ?>
<!-- Input text fields -->
<fieldset>
	<div class="widget first">
		<div class="head"><h5 class="iList">Add New Slider</h5></div>
			<div class="rowElem noborder"><label style="width:auto;">Image Link:</label><div class="formRight" style="width:590px;">
				<?php echo $this->Form->text('Slider.image_link', array('class'=>'validate[required]')); ?>
				<?php echo $this->Form->error('Slider.image_link', null, array('class' => 'error')); ?>
			</div><div class="fix"></div></div>
			
			<div class="rowElem noborder"><label style="width:auto;">Image:</label><div class="formRight" style="width:590px;">
				<?php echo $this->Form->file('Slider.image_name', array('maxlength'=>128,'class'=>'validate[required]')); ?>
				<?php echo $this->Form->error('Slider.image_name', null, array('class' => 'error')); ?>
			</div><div class="fix"></div></div>
		
			<div class="rowElem noborder">
				<label style="width:auto;">Status :</label>
				<div class="formRight" style="width:590px;">                        
					<?php echo $this->Form->checkbox('Slider.status', array('style' => 'display:block;')); ?>
					&nbsp;&nbsp;(Check to make Active)
				</div>
				<div class="fix"></div>
			</div>
			
			<input type="submit" value="Save" class="greyishBtn submitForm" />
			<input type="button" value="Cancel" class="greyishBtn submitForm" onclick="location.href='<?php echo $this->Html->url('/admin/sliders/sliders/index/');?>'" />
			
			<div class="fix"></div>

	</div>
</fieldset>
<?php echo $this->Form->end(); ?>

    </div>
    
<div class="fix"></div>
</div>

</div>

<script>
	function load_translation_file() {
	
		var language 	= jQuery("#SliderLanguage").val();
		
		if(language != '') {
			
			var content_id = '<?php echo $pid; ?>';
			var actionurl = '<?php echo SITE_URL; ?>'+"admin/sliders/sliders/edit/"+content_id+"/"+language;
			window.location = actionurl;
		}
	}
</script>