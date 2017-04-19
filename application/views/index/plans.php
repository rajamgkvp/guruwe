<?php
//echo "<pre>";
//print_r($plans);
?>
<div class="section">
    <div class="container">
        <div class="content row">
            <div class="col-sm-12 col-md-12">
                <div class="row content-page">
                    
                    <div class="row db-padding-btm db-attached">
                        
                        <?php
                        foreach($plans['filedata'] as $value)
                        {
                           // echo "<pre>";
                            //print_r($value);
                            ?>
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                            <div class="db-wrapper">
                                <div class="db-pricing-eleven db-bk-color-one">
                                    <div class="plan free-plan">
                                        <div class="type">
                                            <?php echo $value->plan;?>
                                        </div>
                                        <div class="price">
                                            <ul class="list-inline">
                                                <li><?php echo $value->label;?><br/>
                                                <?php echo $value->price;?></li>
                                            </ul>
                                        </div>
                                        <button type="button" class="btn btn-pricing">Get Started</button>
                                    </div>
                                    <?php echo $value->description;?>
                                    
                                    <div class="pricing-footer">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }
                        /*
                        ?>
                        
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                              <div class="db-wrapper">
                            <div class="db-pricing-eleven db-bk-color-two popular">
                                <div class="plan paid-plan big-plan">
                                    <div class="type">
                                        Most Popular
                                    </div>
                                    <div class="price">
                                        <div class="sub-head">Professional</div>
                                        <ul class="list-inline">
                                            <li><sup>$</sup>199</li>
                                            <li><small>/mo</small></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="btn btn-pricing">Get Started</button>
                                </div>
                                <ul class="ullist">

                                    <li><i class="fa fa-check"></i>30+ Accounts </li>
                                    <li><i class="fa fa-check"></i>150+ Projects </li>
                                    <li><i class="fa fa-check"></i>Lead Required</li>
                                </ul>
                                <div class="pricing-footer">
                                    
                                </div>
                            </div>
                                  </div>
                        </div>
                        
                        
                        
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                              <div class="db-wrapper">
                            <div class="db-pricing-eleven db-bk-color-three">
                                <div class="plan paid-plan2">
                                    <div class="type">
                                        Business
                                    </div>
                                    <div class="price">
                                        <ul class="list-inline">
                                            <li><sup>$</sup>199</li>
                                            <li><small>/mo</small></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="btn btn-pricing">Get Started</button>
                                </div>
                                <ul class="ullist">
                                    <li><i class="fa fa-check"></i>30+ Accounts </li>
                                    <li><i class="fa fa-check"></i>150+ Projects </li>
                                    <li><i class="fa fa-check"></i>Lead Required</li>
                                </ul>
                                <div class="pricing-footer">
                                    
                                </div>
                            </div>
                                  </div>
                        </div>
                        
                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                              <div class="db-wrapper">
                            <div class="db-pricing-eleven db-bk-color-six">
                                <div class="plan paid-plan2">
                                    <div class="type">
                                        EXTENDED PLAN
                                    </div>
                                    <div class="price">
                                        <ul class="list-inline">
                                            <li><sup>$</sup>199</li>
                                            <li><small>/mo</small></li>
                                        </ul>
                                    </div>
                                    <button type="button" class="btn btn-pricing">Get Started</button>
                                </div>
                                <ul class="ullist">
                                    <li><i class="fa fa-check"></i>30+ Accounts </li>
                                    <li><i class="fa fa-check"></i>150+ Projects </li>
                                    <li><i class="fa fa-check"></i>Lead Required</li>
                                </ul>
                                <div class="pricing-footer">
                                </div>
                            </div>
                        </div>
                    </div>
<?php
*/
?>

                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body{
        background: #fff;
    }
    .nav .bar, .nav .bar::before, .nav .bar::after{
        background:#000;
    }
</style>