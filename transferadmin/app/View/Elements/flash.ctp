<!-- <div class="pt20">
	<div class="nNote nFailure hideit">
		<p><strong>Error: </strong>
		
		</p>
	</div>
</div> -->
<div id="flashmessage" class="<?php echo $class;?>">
	<?php echo $message ?>
</div>
<script type="text/javascript">
$(document).ready(function(){
	flashmessage();
});
function flashmessage(){
	$( "#flashmessage" ).animate({
		top: "+=38",
		}, 1000, function() {
			setTimeout("fadeoutmessage('flashmessage')",2000)
	});
}

function fadeoutmessage(id){
	$('#'+id).fadeOut('slow');
}
</script>