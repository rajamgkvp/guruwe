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
    <div class="status download">
        <div class="c100">
            <span class="tickmark show">
                <div class="arrow-down"><i class="fa fa-arrow-down"></i></div>
            </span>

            <div class="slice">
                <div class="bar"></div>
                <div class="fill"></div>
            </div>
        </div>
        <div class="transfer-done">
            <h3>We're ready...</h3>
            <div class="info">
                <span class="filename"><span style="display: inline-block">Harry-Potter-and-the-Cursed-Chi- ...doc</span></span>
                <br>
                1.5 MB
            </div>
        </div>

        <div class="transfer-again download-btn"><a class="btn transfer-again" href="<?php echo $download_link; ?>">Download</a></div>
    </div>
</div>
<style>
.plus-panel{
    top: 110%;
}
</style>
