<div class="section">
    <div class="container">
        <div class="content row">
            <?php echo $content[0]['Content']['content']; ?>
            <?php if($content[0]['Content']['slug'] == 'guru-transfer-pro'){ ?>
             	<div class="feedback-form">
             		<div class="span">Have your say!</div>
             		<form id="feedback" method="post" action="<?php echo BASE_PATH; ?>/index/feedback">
	             		<div class="forms">
	             			<div class="col-sm-3 col-md-3 no-padding">
	             				<input type="text" value="" placeholder="name" name="name" id="name">
	             				<input type="text" value="" placeholder="email" name="email" id="email">
	             			</div>
	             			<div class="col-sm-6 col-md-6 no-padding">
	             				<textarea placeholder="Your feedback/idea" name="feedback" id="feedback"></textarea>
	             			</div>
	             			<div class="col-sm-3 col-md-3">
	             				<input type="submit" value="submit" name="submit">
	             			</div>
	             		</div>
             		</form>
             	</div>
            <?php } ?>
        </div>
    </div>
</div>

<style>
    .navbar-fixed-top, .navbar-fixed-bottom{
        position: relative;
    }
</style>