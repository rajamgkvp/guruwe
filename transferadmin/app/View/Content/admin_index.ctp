<?php echo $this->Html->css('dataTable'); ?> 

<?php echo $this->Html->script('dataTables/jquery.dataTables'); ?> 
<?php echo $this->Html->script('dataTables/colResizable.min'); ?> 

<?php echo $this->Html->script('wysiwyg/jquery.wysiwyg'); ?> 
<?php echo $this->Html->script('wysiwyg/wysiwyg.image'); ?> 
<?php echo $this->Html->script('wysiwyg/wysiwyg.link'); ?> 
<?php echo $this->Html->script('wysiwyg/wysiwyg.table'); ?> 

<?php echo $this->Html->script('selectunselect'); ?> 

<?php
	if(isset($status) && trim($status)!=""){
		$url = array($status);
		$this->Paginator->options(array('url' => $url));
	}
?>

<script type="text/javascript">
<!--
function del(field) {
	 if(!anyChecked(field)) {
	 	// alert('Please select atleast one record to perform any action.');
		jAlert('Please select atleast one record to perform any action.', 'Alert::MyDementiaCare');
	 	return false;
	 } else {
		 if(jQuery('#ContentStatus').val() == 'delete'){
			if(!confirm("Are you sure you want to perform this action?")){
				return false;
			}
		 } else {
			 return true;
		 }
	 }
}
//-->
</script>





<?php echo $this->Form->create(null ,array('url'=>'#')); ?>

<div class="content">
<div class="title"><h5>Manage content</h5></div>

<div class="users index">
 
<?php 
if (($this->Session->check('Message.flash'))) {
	echo $this->Session->flash('flash', array('element' => 'flash'));
}
?>
 
 <div align="right">
<a class="btnIconLeft mt5" title="" href="<?php echo SITE_URL; ?>admin/content/add/"><img class="icon" alt="" src="<?php echo SITE_URL; ?>img/icons/dark/presentation.png"><span>Add New Page</span></a>
 </div>
	
<div class="table">
            <div class="head"><h5 class="iFrames">content</h5></div>
            <div class="dataTables_wrapper" id="example_wrapper">
			<div class="" style="visibility:hidden;">
				<div class="dataTables_filter" id="example_filter">
					<label>Search: <input type="text" placeholder="type here...">
					<div class="srch"></div>
					</label>
				</div>
			</div>
				
			<table cellspacing="0" cellpadding="0" border="0" id="" class="display">
                <thead>
                    <tr>
						<th rowspan="1" colspan="1"  width="2%" id="none" class="none;">
								
							<?php echo $this->Form->text('Content.all', array('type'=>'checkbox', 'id'=>'data[Content][all]', 'style' => 'display:block;', 'onclick'=>"selectDeselect('data[Content][id][]', this.name);"));?>
							
						</th>
						<th class="ui-state-default" rowspan="1" colspan="1" width="2%">
							<div class="DataTables_sort_wrapper">
								SNo.
							</div>
						</th>
						<th class="ui-state-default" rowspan="1" colspan="1">
							<div class="DataTables_sort_wrapper">
								<?php echo $this->Paginator->sort('page_title', 'Title'); ?>
							<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
							</div>
						</th>
						
						<th class="ui-state-default" rowspan="1" colspan="1">
							<div class="DataTables_sort_wrapper">
								Page Url
							</div>
						</th>
						
						<th class="ui-state-default" rowspan="1" colspan="1"  width="12%">
							<div class="DataTables_sort_wrapper">
								<?php echo $this->Paginator->sort('created', 'Created'); ?>
							<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
							</div>
						</th>
						<th class="ui-state-default" rowspan="1" colspan="1"  width="6%">
							<div class="DataTables_sort_wrapper">
							<?php echo $this->Paginator->sort('status', 'Status'); ?>
							<span class="DataTables_sort_icon css_right ui-icon ui-icon-carat-2-n-s"></span>
							</div>
						</th>
					</tr>
                </thead>
				
				
				
				<tbody>				
				<?php
				$rowcount = 0;
				$countContents = count($content);
				if($countContents > 0){
				foreach ($content AS $row) {
				$index = ((($page-1)*$limit) + ($rowcount+1));
				?>
				<tr class="gradeA <?php if($rowcount%2==0) echo 'odd'; else echo 'even';?>">
					<td align="center">
						
						<?php echo $this->Form->text('Content.id][', array('type'=>'checkbox', 'style' => 'display:block;', 'value'=>$content[$rowcount]['Content']['id'],  'onclick'=>"checkSelection('data[Content][id][]', 'data[Content][all]')"));?>
						
					</td>
					<td align="center"><?php echo $index;?></td>
					<td><?php 
							echo $this->Html->link($content[$rowcount]['Content']['page_title'], '/admin/content/edit/'.$content[$rowcount]['Content']['id'].'/', array('title'=>'Click here to edit content details'));
					?></td>
					<td align="left">
						<a href="<?php echo SITE_URL; ?><?php echo $content[$rowcount]['Content']['slug']; ?>" target="_blank"><?php echo SITE_URL; ?><?php echo $content[$rowcount]['Content']['slug']; ?></a>
					</td>
					<td align="center"><?php echo date(DATE_FORMAT, strtotime($content[$rowcount]['Content']['created'])); ?></td>
					<td align="center">
					<?php
						 if($content[$rowcount]['Content']['status'] == 1) {
							echo $this->Html->image('active.png', array('alt'=>'Active' , 'title'=>'Active' , 'border'=>'0'));
						} else {
							echo $this->Html->image('inactive.png', array('alt'=>'Inactive' , 'title'=>'Inactive' , 'border'=>'0'));
						}
					?>
					</td>
				</tr>
				<?php
					$rowcount++;
				}
				}
				?>
				</tbody>
				
				</table>
				
				
				<?php
				if($countContents > 0){
				?>
				
				<?php echo $this->element('admin/paginate')?>

				<div class="fg-toolbar ui-toolbar  ui-corner-bl ui-corner-br ui-helper-clearfix">
					<div id="example_length" class="dataTables_length">
						<?php
							echo $this->Form->input('Content.status', array(
								'options' => $mode,
								'empty' => '(action)',
								'label' => false,
								'class' => 'validate[required]',
								'error' => false,
								'div'	=> false
							));
						?>
						&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="Submit" class="redBtn" onclick="return del('data[Content][id][]')" name="data[Content][submit]">
					</div>
						<div class="dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers" id="example_paginate">
							
					</div>
				</div>	

				<?php
				}
				else {
				?>
				<div class="fg-toolbar ui-toolbar ui-widget-header ui-corner-bl ui-corner-br ui-helper-clearfix">
					<div class="dataTables_length" id="example_length">
						<label>No Records Available Yet.</label></div>
				</div>
				<?php
				}
				?>
			</div>
        </div>	
</div>
</div>

<?php echo $this->Form->end(); ?>
