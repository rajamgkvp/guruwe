<div class="section">
    <div class="container">
        <div class="content row">
            <div class="col-sm-12 col-md-12">
                <div class="row content-page">
                    <form method="POST" action="" name="checkout" class="checkout-form">
                        <div class="col-sm-5 col-md-5 section-block">
                            <div class="section-heading">Plans with Guru Transfer Plus</div>
                            <div class="pricing-block">
                                <ul class="list-inline">
                                    <li>
                                        <input type="radio" class="button" id="price120" name="price" value="120"></input>
                                        <label for="price120">
                                            <div class="pricing">
                                                <div class="price">$120</div>
                                                <div class="time">Annual</div>
                                                <div class="labelsave">Best value save 17%</div>
                                            </div>
                                        </label>        
                                    </li>
                                    <li>
                                        <input type="radio" class="button" id="price12" name="price" value="12"></input>
                                        <label for="price12">
                                            <div class="pricing">
                                                <div class="price">$12</div>
                                                <div class="time">Monthly</div>
                                                <div class="labelsave">Recurring Billing</div>
                                            </div>
                                        </label>        
                                    </li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="pwd" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="pwd" name="confirm_password" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="col-sm-5 col-md-5 section-block">
                            <div class="section-heading">Plans with Guru Transfer Plus</div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name" name="name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Company(optional)" name="company">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Address" name="address">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="City" name="city">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Zip Code" name="zip">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Country" name="country">
                            </div>
                            <div class="pull-left">
                                <label>I accept <a href="<?php echo BASE_PATH;?>/terms">Terms &amp; Conditions</a></label>
                            </div>
                            <button type="submit" class="btn btn-default pull-right">Complete your order</button>
                        </div>
                    </form>
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