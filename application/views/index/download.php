<div id="gallery">
<div class="bigImages">
    <ul>
        <?php foreach ($sliders as $key => $slider) { ?>
            <?php $class = ''; if($key != 0){
                $class = 'style="display:none"';
            } ?>
            <li <?php echo $class; ?>>
                <?php if($slider['Slider']['image_link'] != '#'){ ?>
                    <a href="<?php echo $slider['Slider']['image_link']; ?>" target="_blank"><div class="slider" style="background: transparent url('<?php echo ADMIN_PATH ?>/files/slides/<?php echo $slider['Slider']['image_name'] ?>') repeat scroll 0% 0% / cover ;"></div></a>
                <?php }else{ ?>
                    <div class="slider" style="background: transparent url('<?php echo ADMIN_PATH ?>/files/slides/<?php echo $slider['Slider']['image_name'] ?>') repeat scroll 0% 0% / cover ;"></div>
                <?php } ?>


            </li>
        <?php } ?>
    </ul>
    </div>
</div>

<div class="gurutransfer">
    <div class="plus-panel">
        <a href="<?php echo BASE_PATH; ?>/guru-transfer-pro"><div class="panel2 panelp">
            Guru Transfer Pro
        </div></a>
    </div>
    <div class="header"></div>
    <div class="status download2">
        <div class="c100">
            <span class="tickmark show">
                <div class="arrow-down"><i class="fa fa-arrow-down"></i></div>
            </span>

            <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
            </div>
        </div><div class="clearfix"></div>

        <?php if($passworddata){ ?>
            <?php if(isset($passworddata['flag']) && $passworddata['flag'] == 5){ ?>
		<div class="transfer-done">
                    <h3>Oops...</h3>
                    <div class="info">
                        <span class="filename"><span style="display: inline-block">The link for the file has been expired.</span></span>
                        <br>
                    </div>
                </div>
                <div class="transfer-again"><a class="btn transfer-again" href="<?php echo BASE_PATH; ?>">Try Again</a></div>
        	
	    <?php }else{ ?>
		<div class="transfer-done">
                    <h3>We're ready...</h3>
                    <div class="info">
                        <span class="filename"><span style="display: inline-block"><?php echo basename($passworddata['file']); ?></span></span>
                        <br>
                    </div>
                </div>

                <?php if($passworddata['password'] != ''){ ?>
                    <input type="hidden" value="<?php echo $passworddata['password']; ?>" id="password_value">
                    <div class="friend-password-block download">
                        <input type="password" value="" name="password" placeholder="Password" id="password_enter">
                        <div class="clearfix"></div>
                    </div>
                <?php } ?>

                <?php if($passworddata['password'] == ''){ ?>
                    <div class="transfer-again download-btn"><a class="btn transfer-again" href="<?php echo $download_link; ?>">Download</a></div>
                <?php }else{ ?>
                    <div class="transfer-again download-btn-password"><a class="btn transfer-again" href="javascript:void(0)" data-href="<?php echo $download_link; ?>">Download</a></div>
                <?php } ?>        
            <?php } ?>
        <?php }else{ ?>
            <div class="transfer-done">
                <h3>We're ready...</h3><br>
            </div>
            <div class="transfer-again download-btn-password"><a class="btn transfer-again" href="javascript:void(0)" data-href="<?php echo $download_link; ?>">Download</a></div>
        <?php } ?>


    </div>
</div>

<div style="display:none" id="tip_panel" class="recipients_tip nofiles">
<img width="116" height="116" src="<?php echo BASE_PATH; ?>/img/minipanel-info-5b11188338a077169ddc9d9e42337a68.png" alt="">
<h3>Tip</h3>
<p class="content">You have entered wrong password.</p></div>

<style>
.plus-panel{
    top: 110%;
}
#tip_panel::after{
    top: 93%;
}
#tip_panel{
    top: 43%;
}
</style>
