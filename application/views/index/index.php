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
<?php if(isset($_SESSION['Member']) && !empty($_SESSION['Member'])){
    $total = '3GB';
    $totalupload = '3G';
}else{
    $total = '2GB';
    $totalupload = '2G';
} ?>
<div class="gurutransfer">
    <div class="plus-panel">
        <a href="<?php echo BASE_PATH; ?>/guru-transfer-pro"><div class="panel2 panelp">
            Guru Transfer Pro
        </div></a>
    </div>
    <div class="header"></div>
    <div class="transferbody">
        <form id="uploadform" method="post" enctype="multipart/form-data" action="<?php echo BASE_PATH; ?>">
            <input type="hidden" value="email-block" id="openedblock" name="openedblock">
            <?php if(isset($_SESSION['Member']) && !empty($_SESSION['Member'])){ ?>
                <input type="hidden" value="<?php echo $_SESSION['Member']['id']; ?>" name="useremail">
            <?php }else{ ?>
                <input type="hidden" value="0" name="useremail">
            <?php } ?>
            <input type="hidden" value="<?php echo $totalupload; ?>" name="total_upload" id="total_upload">
            <div class="upload-panel">
                <h2>Send Up To <?php echo $total ?></h2><div class="clearfix"></div>
                <div class="add-files-block">
                    <div class="button">
                        <ul class="more">
                            <li>
                                <div id="uploader_div"></div>
                                <!--<div class="upload-wrap-btn-Change">
                                    <span class="button_area_new">+ ADD FILES</span>
                                    <input type="file" name="files[]" id="files" value="" class="files">
                                </div>-->
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="email-block">
                    <div class="friend-email-block">
                        <div class="friend-email-scroll">
                            <input type="text" value="" name="friend_email[]" placeholder="Friend's Email">
                            <div class="add_more_email"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="my-email-block">
                        <input type="text" value="" name="from_email" placeholder="Your Email">
                        <div class="clearfix"></div>
                    </div>
                    <div class="message">
                        <textarea placeholder="Message" name="message"></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="link-block" style="display:none;">
                    <div class="message-box">
                        We will give you a download link once your transfer is complete. The file(s) will be kept for 7 days.
                    </div>
                </div>
            </div>

            <div class="share-and-transfer">
                <div class="share"></div>
                <div class="share-option">
                    <ul>
                        <li class="active" data-for="email-block">Email</li>
                        <li data-for="link-block">Link</li>
                    </ul>
                </div>
                <button class="transfer">transfer</button>
                <div class="info"></div>
                <div class="clearfix"></div>
            </div>
        </form>
    </div>
    <div class="status" style="display:none">
        <div class="c100 p0">
            <span class="loading">0%</span>
            <span class="tickmark"><div class="checkmark">
                <div class="checkmark_stem"></div>
                <div class="checkmark_kick"></div>
            </div></span>

            <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
            </div>
        </div>
        <div class="transfer-done"><div class="transfer">Encrypting...</div><div class="small"></div></div>
    </div>
</div>

<div class="upload-more-btn hide">
    <div class="upload-wrap-btn-Change">
        <span class="button_area_new">+ ADD MORE FILES</span>
        <input type="file" name="files[]" id="files" value="" class="files">
    </div>
</div>

<div style="display: none;" id="error_panel" class="nofiles">
<img width="116" height="116" src="<?php echo BASE_PATH; ?>/img/minipanel-exclamation-4c40782340734c8c59f2373b80878c98.png" alt="">
<h3>Oops</h3>
<p class="content">You haven't actually added any files yet.</p></div>

<div style="display: none" id="info_panel" class="nofiles">
<img width="116" height="116" src="<?php echo BASE_PATH; ?>/img/minipanel-info-5b11188338a077169ddc9d9e42337a68.png" alt="">
<h3>&nbsp;</h3><p>&nbsp;</p>
</div>

<div style="display:none" id="tip_panel" class="recipients_tip nofiles">
<img width="116" height="116" src="<?php echo BASE_PATH; ?>/img/minipanel-info-5b11188338a077169ddc9d9e42337a68.png" alt="">
<h3>Tip</h3>
<p class="content">You can enter up to 20 email addresses to send to. If you just want a download link, click on the share button below.</p></div>

<div class="info-overlay" style="display:none">
  <div class="overlay-data">
    <img src="<?php echo BASE_PATH; ?>/img/info-full.png">
  </div>
  <div class="overlay"></div>
</div>

<style type="text/css">
    .addthis-smartlayers{
        display: none !important;
    }
</style>
