<?php
	echo $this->Html->script('ckeditor/ckeditor');
?>

<div class="content">
    <div class="title"><h5>Manage content</h5></div>
<!-- Main wrapper -->
<div class="wrapper" style="margin-top:15px;">
<div class="content" id="container">

<?php echo $this->Form->create('Content', array('url'=>'/admin/album/edit/'.$pid.'/', 'enctype'=>'multipart/form-data', 'class'=>'mainForm')); ?>
<!-- Input text fields -->
<fieldset>
	<div class="widget first">
		<div class="head"><h5 class="iList">Album name</h5></div>
			<div class="rowElem noborder"><label style="width:auto;">Album Title:</label><div class="formRight" style="width:550px;">
				<?php echo $this->Form->text('Album.title'); ?>
				<?php echo $this->Form->error('Album.title', null, array('class' => 'error')); ?>
			</div><div class="fix"></div></div>
			
			<div class="rowElem noborder"><label style="width:auto;">Description:</label><div class="formRight" style="width:550px;">
				<div id="language_content">
					<?php echo $this->Form->textarea('Album.description', array('id'=>'description')); ?>
				</div>
				<script type="text/javascript">
				//<![CDATA[
				 CKEDITOR.replace('description',
				 {
					filebrowserBrowseUrl :'<?php echo SITE_URL;?>app/webroot/js/editor/js/ckeditor/filemanager/browser/default/browser.html?Connector=<?php echo SITE_URL;?>editor/js/ckeditor/filemanager/connectors/php/connector.php',
					filebrowserImageBrowseUrl : '<?php echo SITE_URL;?>app/webroot/js/editor/js/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?php echo SITE_URL;?>editor/js/ckeditor/filemanager/connectors/php/connector.php',
					filebrowserFlashBrowseUrl :'<?php echo SITE_URL;?>js/editor/js/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?php echo SITE_URL;?>app/webroot/editor/js/ckeditor/filemanager/connectors/php/connector.php',
					filebrowserUploadUrl  :'<?php echo SITE_URL;?>app/webroot/js/editor/js/ckeditor/filemanager/connectors/php/upload.php?Type=File',
					filebrowserImageUploadUrl : '<?php echo SITE_URL;?>app/webroot/js/editor/js/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
					filebrowserFlashUploadUrl : '<?php echo SITE_URL;?>app/webroot/js/editor/js/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
				});
				//]]>
				</script>
			</div><div class="fix"></div></div>
			
			<div class="rowElem noborder">
				<label style="width:auto;">Status :</label>
				<div class="formRight" style="width:608px;">                        
					<?php echo $this->Form->checkbox('Album.status', array('style' => 'display:block;')); ?>
					&nbsp;&nbsp;(Check to make Active)
				</div>
				<div class="fix"></div>
			</div>
			
			<?php echo $this->Form->hidden('Album.id', array('value' =>$pid)); ?>
			
			<input type="submit" value="Save" class="greyishBtn submitForm" />
			<input type="button" value="Cancel" class="greyishBtn submitForm" onclick="location.href='<?php echo $this->Html->url('/admin/album/index/');?>'" />
			
			<div class="fix"></div>

	</div>
</fieldset>
<?php echo $this->Form->end(); ?>

    </div>
    
<div class="fix"></div>
</div>
</div>
