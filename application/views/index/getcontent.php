<div class="section">
    <div class="container">
        <div class="content row">
            <div class="col-sm-12 col-md-12">
                <div class="row content-page">
                    <?php echo $content[0]['Blogpost']['post_content']; ?>
                    <?php if($content[0]['Blogpost']['post_name'] == 'guru-transfer-pro'){ ?>
                        <div class="col-sm-6 col-md-6 pro-form">
                            <div class="feedback-form">
                                <form id="feedback" method="post" action="<?php echo BASE_PATH; ?>/index/feedback">
                                    <div class="forms">
                                        <div class="col-sm-12 col-md-12 no-padding">
                                            <input type="text" value="" placeholder="name" name="name" id="name">
                                            <input type="text" value="" placeholder="email" name="email" id="email">
                                        </div>
                                        <div class="col-sm-12 col-md-12 no-padding">
                                            <textarea placeholder="Your feedback/idea" name="feedback" id="feedback"></textarea>
                                        </div>
                                        <div class="col-sm-12 col-md-12 no-padding">
                                            <input type="submit" value="submit" name="submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .navbar-fixed-top, .navbar-fixed-bottom{
        position: relative;
    }
    body{
        background: #d3d3d3;
    }
</style>


<!--
<div class="banner mobile" style="background:url('<?php echo BASE_PATH; ?>/img/content/mobile-back.png')">
                        <div class="col-sm-6 col-md-8">
                            <div class="title"><?php echo $content[0]['Content']['title']; ?></div>
                            <div class="small-desc"><?php echo $content[0]['Content']['short_description']; ?></div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <img src="<?php echo BASE_PATH; ?>/img/content/mobile-screen.png">
                        </div>
                        <div class="store-logo">
                            <ul>
                                <li><img src="<?php echo BASE_PATH; ?>/img/content/google-play.png"></li>
                                <li><img src="<?php echo BASE_PATH; ?>/img/content/iphone.png"></li>
                                <li><img src="<?php echo BASE_PATH; ?>/img/content/amazon.png"></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h2>Our Skill</h2>
                        <p>Presenting brand new Bollywood track "Dil Mein Chhupa Loonga " with LYRICS from movie Wajah Tum Ho directed by Vishal Pandya and produced by T-Series Films starring Sana Khan, Sharman Joshi, Gurmeet Choudhary and Rajniesh Duggall in the lead roles. Film Releasing 2nd December 2016.</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h2>Our Skill</h2>
                        <p>Presenting brand new Bollywood track "Dil Mein Chhupa Loonga " with LYRICS from movie Wajah Tum Ho directed by Vishal Pandya and produced by T-Series Films starring Sana Khan, Sharman Joshi, Gurmeet Choudhary and Rajniesh Duggall in the lead roles. Film Releasing 2nd December 2016.</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h2>Our Skill</h2>
                        <p>Presenting brand new Bollywood track "Dil Mein Chhupa Loonga " with LYRICS from movie Wajah Tum Ho directed by Vishal Pandya and produced by T-Series Films starring Sana Khan, Sharman Joshi, Gurmeet Choudhary and Rajniesh Duggall in the lead roles. Film Releasing 2nd December 2016.</p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <h2>Our Skill</h2>
                        <p>Presenting brand new Bollywood track "Dil Mein Chhupa Loonga " with LYRICS from movie Wajah Tum Ho directed by Vishal Pandya and produced by T-Series Films starring Sana Khan, Sharman Joshi, Gurmeet Choudhary and Rajniesh Duggall in the lead roles. Film Releasing 2nd December 2016.</p>
                    </div>-->