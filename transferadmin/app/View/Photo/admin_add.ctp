<?php
/**
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Pages
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

<?php
	echo $this->Html->script('ckeditor/ckeditor');
?>

<div class="content">
    <div class="title"><h5>Manage Photo</h5></div>
<!-- Main wrapper -->
<div class="wrapper" style="margin-top:15px;">
<div class="content" id="container">

<?php echo $this->Form->create('Photo' ,array('url'=>'/admin/photo/add/', 'enctype'=>'multipart/form-data', 'class'=>'mainForm')); ?>
<!-- Input text fields -->
<fieldset>
	<div class="widget first">
		<div class="head"><h5 class="iList">Add New Photo</h5></div>
			<div class="rowElem noborder"><label style="width:auto;">Title:</label><div class="formRight" style="width:590px;">
				<?php echo $this->Form->text('Photo.title', array('class'=>'validate[required]')); ?>
				<?php echo $this->Form->error('Photo.title', null, array('class' => 'error')); ?>
			</div><div class="fix"></div></div>
			
			<div class="rowElem noborder"><label style="width:auto;">Select Album:</label><div class="formRight" style="width:590px;">
				<select name="data[Photo][album_id]">
					<option value="0">Public</option>
					<?php foreach($album as $albs){ ?>
						<option value="<?php echo $albs['Album']['id']; ?>"><?php echo $albs['Album']['title']; ?></option>
					<?php } ?>
				</select>
			</div><div class="fix"></div></div>
			
			<div class="rowElem noborder"><label style="width:auto;">Sub Title:</label><div class="formRight" style="width:590px;">
				<?php echo $this->Form->text('Photo.sub_title'); ?>
			</div><div class="fix"></div></div>
			
			<div class="rowElem noborder"><label style="width:auto;">Description:</label><div class="formRight" style="width:590px;">
				<?php echo $this->Form->textarea('Photo.description', array('id'=>'description')); ?>
				<script type="text/javascript">
				//<![CDATA[
				 CKEDITOR.replace( 'description',
				 {
					filebrowserBrowseUrl :'<?php echo SITE_URL;?>js/editor/js/ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo SITE_URL;?>editor/js/ckeditor/filemanager/connectors/php/connector.php',
					filebrowserImageBrowseUrl : '<?php echo SITE_URL;?>js/editor/js/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo SITE_URL;?>editor/js/ckeditor/filemanager/connectors/php/connector.php',
					filebrowserFlashBrowseUrl :'<?php echo SITE_URL;?>js/editor/js/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo SITE_URL;?>editor/js/ckeditor/filemanager/connectors/php/connector.php',
					filebrowserUploadUrl  :'<?php echo SITE_URL;?>js/editor/js/ckeditor/filemanager/connectors/php/upload.php?Type=File',
					filebrowserImageUploadUrl : '<?php echo SITE_URL;?>js/editor/js/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
					filebrowserFlashUploadUrl : '<?php echo SITE_URL;?>js/editor/js/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
				});
				//]]>
				</script>
			</div><div class="fix"></div></div>
			
			<div class="rowElem noborder"><label style="width:auto;">Image:</label><div class="formRight" style="width:590px;">
				<?php echo $this->Form->file('Photo.photo', array('maxlength'=>128,'class'=>'validate[required]')); ?>
				<?php echo $this->Form->error('Photo.photo', null, array('class' => 'error')); ?>
			</div><div class="fix"></div></div>
		
			<div class="rowElem noborder">
				<label style="width:auto;">Status :</label>
				<div class="formRight" style="width:590px;">                        
					<?php echo $this->Form->checkbox('Photo.status', array('style' => 'display:block;')); ?>
					&nbsp;&nbsp;(Check to make Active)
				</div>
				<div class="fix"></div>
			</div>
			
			<input type="submit" value="Save" class="greyishBtn submitForm" />
			<input type="button" value="Cancel" class="greyishBtn submitForm" onclick="location.href='<?php echo $this->Html->url('/admin/photo/index/');?>'" />
			
			<div class="fix"></div>

	</div>
</fieldset>
<?php echo $this->Form->end(); ?>

    </div>
    
<div class="fix"></div>
</div>

</div>
