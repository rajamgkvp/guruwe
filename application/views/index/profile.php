<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="http://graph.facebook.com/<?php echo $member['facebook_id'];?>/picture?type=large&redirect=true&width=200&height=200" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo $member['user_name']; ?>
                    </div>
                    <!-- <div class="profile-usertitle-job">
                        Developer
                    </div> -->
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <!-- <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div> -->
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active">
                            <a href="#">
                            <i class="glyphicon glyphicon-home"></i>
                            Home </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_PATH;?>/logout">
                            <i class="fa fa-sign-out"></i>
                            Sign Out </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">

                <div class="mail-box">
                    <aside class="lg-side">
                          <div class="inbox-head">
                              <h3>Transfer History</h3>
                          </div>
                    <table class="table table-inbox table-hover">
                        <?php if($transfer_list){?>
                        <thead>
                            <tr>
                                <td>Comment</td>
                                <td>To</td>
                                <td class="text-center">Time</td>
                                <td class="text-center">Download</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($transfer_list as $list){ ?>
                                <tr class="" onclick="loaddownlaoddata(<?php echo $list->id; ?>, '<?php echo $list->downloadlink;?>', 'downloadbox')">
                                    <td class="view-message  dont-show"><?php echo $list->message; ?></td>
                                    <td class="view-message"><?php echo $list->to_email; ?></td>
                                    <td class="view-message text-center"><?php echo date('D M, g:i a', strtotime($list->created_on)); ?></td>
                                    <td class="view-message inbox-small-cells text-center"><i class="fa fa-download"></i></td>
                                </tr>                            
                            <?php } ?>
                        </tbody>
                        <?php }else{ ?>
                            <tbody>
                            <tr><td>You have not make any transfer.</td></tr>
                            </tbody>
                        <?php } ?>
                    </table>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>