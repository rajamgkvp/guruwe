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
        <div class="firstnot">
            <div class="c100">
                <span class="tickmark show">
                    <div class="arrow-down"><i class="fa fa-arrow-down"></i></div>
                </span>

                <div class="slice">
                    <div class="bar"></div>
                    <div class="fill"></div>
                </div>
            </div><div class="clearfix"></div>
        </div>



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

                <div class="firstnot">
                    <div class="transfer-done">
                        <h3>We're ready...</h3>
                        <div class="info">
                            <!--<span class="filename"><span style="display: inline-block"><?php echo basename($passworddata['file']); ?></span></span>-->
                            <br>
                        </div>
                    </div>
                      <div class="sharepage">
                              <ul class="list-inline social-share">
                                <li class="facebook"><a href="https://www.facebook.com/sharer.php?u=<?php echo BASE_PATH.$_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="http://twitter.com/share?url=<?php echo BASE_PATH.$_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                              </ul>
                        </div>
                </div>


                <!--<div class="transfer-list">
                    <table>
                        <?php foreach ($passworddata['fileList'] as $key => $filelist) {
                            if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='139.162.20.25'){
                                $download_link_s = 'http://139.162.20.253/download/down.php?f='.$filelist->url;
                            }else{
                                $download_link_s = BASE_PATH.'/download/down.php?f='.$filelist->url;
                            }
                        ?>
                            <tr>
                                <td>
                                    <?php echo substr($filelist->file, 8); ?>
                                </td>
                                <td>
                                    <div class="download-btn-password-list"><a class="transfer-list-link" href="javascript:void(0)" data-href="<?php echo $download_link_s; ?>" data-hisid="<?php echo $passworddata['histid'] ?>"><i class="fa fa-download"></i></a></div>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>-->

                

                <?php if(isset($passworddata['password']) && $passworddata['password'] != ''){ ?>
                    <div class="transfer-again download-btn-password"><a class="btn transfer-again" href="javascript:void(0)">Download</a></div>
                <?php }else{ ?>
                    <div class="transfer-again download-btn"><a class="btn transfer-again" href="#">Download</a></div>
                <?php } ?>

            <?php } ?>
        
    </div>
</div>


<div class="lightbox downloadpage" style="display: none">
    <div class="lightbox-content">
        <div class="light-box-close"><i class="fa fa-close"></i></div>
        <div class="loadcontent">
            <div class="download-panel">
                <div class="download-panel">
                    <table class="table table-inbox table-hover">
                        <tbody>
                            <?php
                            foreach($passworddata['fileList'] as $filelist){
                                if($_SERVER['HTTP_HOST']=='localhost' || $_SERVER['HTTP_HOST']=='139.162.20.25'){
                                    $download_link_s = 'http://139.162.20.253/download/down.php?f='.$filelist->url;
                                }else{
                                    $download_link_s = BASE_PATH.'/download/down.php?f='.$filelist->url;
                                }
                            ?>
                            <tr class="">
                                <td class="view-message  dont-show">
                                    <?php if(isset($passworddata['password']) && $passworddata['password'] != ''){ ?>
                                        <div class="download-btn-password-list"><a class="transfer-list-link" href="javascript:void(0)" data-href="<?php echo $download_link_s; ?>" data-hisid="<?php echo $passworddata['histid'] ?>"><p class="no-margin"><?php echo substr($filelist->file, 8); ?></p></a></div>
                                    <?php }else{ ?>
                                        <a href="<?php echo $download_link_s ?>"><p class="no-margin"><?php echo substr($filelist->file, 8); ?></p></a>
                                    <?php }?>
                                </td>
                                <td class="view-message  inbox-small-cells text-center">
                                    <?php if(isset($passworddata['password']) && $passworddata['password'] != ''){ ?>
                                        <div class="download-btn-password-list"><a class="transfer-list-link" href="javascript:void(0)" data-href="<?php echo $download_link_s; ?>" data-hisid="<?php echo $passworddata['histid'] ?>"><i class="fa fa-download"></i></a></div>
                                    <?php }else{ ?>
                                        <a href="<?php echo $download_link_s ?>"><i class="fa fa-download"></i></a>
                                    <?php }?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="download-btn-panel">
                    <?php if(isset($passworddata['password']) && $passworddata['password'] != ''){ ?>
                        <div class="passworddatablock">
                            <input type="hidden" value="<?php echo $passworddata['password']; ?>" id="password_value">
                            <div class="friend-password-block download pull-left">
                                <input type="password" value="" name="password" placeholder="Password" id="password_enter">
                                <div class="clearfix"></div>
                            </div>
                            <div class="pull-left error">Please enter password and then download</div>
                        </div>
                        <div class="btn-download-with-password"><a href="javascript:void(0)" data-href="<?php echo $download_link; ?>" data-hisid="<?php echo $passworddata['histid'] ?>">Download All</a></div>
                    <?php }else{ ?>
                        <div class="btn-download"><a href="<?php echo $download_link; ?>">Download All</a></div>
                    <?php } ?>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="lightbox-overlay2" style="display: block;"></div>
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
