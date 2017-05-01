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
                <div class="add-files-block">
                    <div class="button">
                        <ul class="more">
                            <li>
                                <div class="uploader__empty-state"><svg viewBox="24 0 72 72"><path d="M60.493 72C79.883 72 96 55.882 96 36.493 96 16.118 79.882 0 60.493 0 40.118 0 24 16.118 24 36.493 24 55.883 40.118 72 60.493 72z" fill="#F9AA3E" fill-rule="evenodd"></path><path d="M58 34h-9c-.553 0-1 .452-1 1.01v1.98c0 .567.448 1.01 1 1.01h9v9c0 .553.452 1 1.01 1h1.98c.567 0 1.01-.448 1.01-1v-9h9c.553 0 1-.452 1-1.01v-1.98c0-.567-.448-1.01-1-1.01h-9v-9c0-.553-.452-1-1.01-1h-1.98c-.567 0-1.01.448-1.01 1v9z" fill="#FFF" fill-rule="evenodd"></path></svg><h2>Add your files</h2><p>Add up to <?php echo $total ?></p></div>
                                <div id="uploader_div"></div>
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
                    <div class="terms">
                        <label><input type="checkbox" id="terms" name="terms" value="terms" checked="checked" title="Plese accept terms and conditions"> I accept <a href="<?php echo BASE_PATH; ?>/terms">T&C</a></label>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="link-block" style="display:none;">
                    <div class="message-box">
                        We will give you a download link once your transfer is complete. The file(s) will be kept for 7 days.
                    </div>
                </div>
            </div>

            <div class="transfer_slider">
                <div class="transfer__options">
                    <div class="transfer__option">
                        <label>Send as</label>
                        <div class="radioinput transfer__type-radio">
                            <input type="radio" class="button" id="email" name="type"></input>
                            <label for="email"><div class="radioinput__check"></div><div class="pull-left radioll">Email</div></label>
                        </div>
                        <div class="radioinput transfer__type-radio">
                            <input type="radio" class="button" id="link" name="type"></input>
                            <label for="link"><div class="radioinput__check"></div><div class="pull-left radioll">Link</div></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="share-and-transfer">
                <div class="share">
                    <svg class="transfer__toggle-options" viewBox="0 0 24 24"><path fill="#BABCBF" d="M12,24 C5.372583,24 0,18.627417 0,12 C0,5.372583 5.372583,0 12,0 C18.627417,0 24,5.372583 24,12 C24,18.627417 18.627417,24 12,24 Z M12,22 C17.5228475,22 22,17.5228475 22,12 C22,6.4771525 17.5228475,2 12,2 C6.4771525,2 2,6.4771525 2,12 C2,17.5228475 6.4771525,22 12,22 Z M16.5,13.5 C17.3284271,13.5 18,12.8284271 18,12 C18,11.1715729 17.3284271,10.5 16.5,10.5 C15.6715729,10.5 15,11.1715729 15,12 C15,12.8284271 15.6715729,13.5 16.5,13.5 Z M12,13.5 C12.8284271,13.5 13.5,12.8284271 13.5,12 C13.5,11.1715729 12.8284271,10.5 12,10.5 C11.1715729,10.5 10.5,11.1715729 10.5,12 C10.5,12.8284271 11.1715729,13.5 12,13.5 Z M7.5,13.5 C8.32842712,13.5 9,12.8284271 9,12 C9,11.1715729 8.32842712,10.5 7.5,10.5 C6.67157288,10.5 6,11.1715729 6,12 C6,12.8284271 6.67157288,13.5 7.5,13.5 Z"></path></svg>
                </div>
                <div class="share-option">
                    <ul>
                        <li class="active" data-for="email-block">Email</li>
                        <li data-for="link-block">Link</li>
                    </ul>
                </div>
                <button class="transfer">transfer</button>
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
        <div class="transfer-done"><div class="transfer">Uploading...</div><div class="small"></div></div>
        <div class="sharepage" style="display: none;">
              <ul class="list-inline social-share" style="bottom: 50px">
                <li class="facebook"><a href="https://www.facebook.com/sharer.php?u=<?php echo BASE_PATH; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                <li class="twitter"><a href="http://twitter.com/share?url=<?php echo BASE_PATH; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
              </ul>
        </div>
        <div class="transfer-again hide"><a class="btn transfer-again" href="<?php echo BASE_PATH; ?>">Transfer again</a></div>
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
