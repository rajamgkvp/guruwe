var milliseconds = new Date().getTime();
var setinterval;
var idmy;
$(window).load(function()
{
    centerContent();
    //$('.files').perfectScrollbar();
    $('.friend-email-scroll').perfectScrollbar();
    //$(".ax-file-list").perfectScrollbar();

    $( ".add-files-block" ).on( "change", ".files", function() {
        $('.button .files').html('');
        $( ".files" ).each(function( index ) {

            if($( this ).val() != ''){
                var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
                $('.button .files').append('<li>' + filename + '<div class="closeli">x</div></li>');
                $(".add-files-block .files").scrollTop( $( ".add-files-block .files" ).prop( "scrollHeight" ) );
                $(".add-files-block .files").perfectScrollbar('update');
            }
        });
        var html = $('.upload-more-btn').html();
        $('.button .more .upload-wrap-btn-Change').hide();
        $('.button .more').append('<li>'+html+'</li>');
    });

    $('.status').height($('.transferbody').height()-10);
    if($('.status.download2').length > 0){
        $('.status.download2').height($('.c100').height() + $('.transfer-done').height() + $('.friend-password-block').height()+130);
    }
    

    var status = $('.status');
    var percent = $('.loading');
    var bar = $('.c100');
    var html ='';
    var setval = 0;
    var opened = $('#openedblock').val();
    var total = 0;

    $('#uploader_div').ajaxupload({
        url:baseUrl+'/upload.php',
        remotePath:'uploaded/',
        maxFileSize:$('#total_upload').val(),
        form:'#uploadform',
        beforeUploadAll: function(result) {
                opened = $('#openedblock').val();
                var topo = ($('.button .more > li:last-child').offset().top)/2;
                $('.nofiles').fadeOut();
                if(opened == 'email-block'){
                    setval = 0;
                    if($('.friend-email-block > .friend-email-scroll > input').val() == ''){
                        setval = 1;
                        $('#info_panel h3').html('Doh!');
                        $('#info_panel p').html('Looks like you forgot to enter any email addresses to send to.');
                        $('#info_panel').css('top', topo+'px').fadeIn();
                        removetips();
                    }else if($('.my-email-block > input').val() == ''){
                        setval = 1;
                        $('#info_panel h3').html('Doh!');
                        $('#info_panel p').html('Looks like you forgot to enter Your email addresses for.');
                        $('#info_panel').css('top', topo+'px').fadeIn();
                        removetips();
                    }else if(isEmailAddress($('.my-email-block > input').val())==false){
                        setval = 1;
                        $('#info_panel h3').html('Doh!');
                        $('#info_panel p').html('Please enter valid email address.');
                        $('#info_panel').css('top', topo+'px').fadeIn();
                        removetips();
                    }else if($('input[name="terms"]:checked').length == 0){
                        setval = 1;
                        $('#info_panel h3').html('Doh!');
                        $('#info_panel p').html('Please select terms and conditions.');
                        $('#info_panel').css('top', topo+'px').fadeIn();
                        removetips();
                    }
                    // else if($('#countremain').val() <= 0){
                    //     setval = 1;
                    //     $('#info_panel h3').html('Doh!');
                    //     $('#info_panel p').html('You have used your max password limit. <a href="'+baseUrl+'/plans" style="text-decoration:underline; color:#fff">Click here</a> to upgrade your plan');
                    //     $('#info_panel').css('top', topo+'px').fadeIn();
                    //     setTimeout(function(){ $('.nofiles').fadeOut(); }, 5000);
                    // }

                    else{
                        setval = 0;
                    }

                    if(setval == 0){
                        $(".friend-email-block > .friend-email-scroll > input").each(function(){
                            if(isEmailAddress($(this).val())==false){
                                setval = 1;
                                $('#info_panel h3').html('Doh!');
                                $('#info_panel p').html('Please enter valid email address to send to.');
                                $('#info_panel').css('top', topo+'px').fadeIn();
                                removetips();
                                return false;
                            }
                        });
                    }
                }else{
                    if($('.ax-file-list > li').length == 0){
                        setval = 1;
                        $('#error_panel').css('top', topo+'px').fadeIn();
                        removetips();
                    }else{
                        setval = 0;
                    }
                }
                if(setval == 1){
                    return false;
                }else{
                    $('.status').height($('.transferbody').height()-10);
                    status.fadeIn();
                    bar.addClass('p0');
                    //percent.html('0%');
                    var str = '';
                    var total = 0;
                    $(".ax-file-size").each(function( index ) {
                        str = $( this ).text().replace ( /[^\d.]/g, '' );
                        total = total + parseInt(str, 10);
                    });
                    setinterval && clearInterval(setinterval);
                    setinterval = setInterval(function(){ progressbar(total) }, 1000);
                }
        },
        finish:function(files, filesObj){
            $.ajax({
                type: 'POST',
                url: baseUrl+'/index/upload_files',
                dataType: 'json',
                data: {'files': JSON.stringify(files), 'formdata': JSON.stringify($("#uploadform").serialize())},
                success: function(results) {
                    clearInterval(setinterval);
                    uploadfinish(results);
                }
            });
        },
        success:function(file){
            console.log('File ' + file + ' uploaded correctly');
        }
    });


    $('#uploadform').submit(function(){
        var topo = ($('.button .more > li:last-child').offset().top)/2;
        if($('.ax-file-list > li').length == 0){
            $('#error_panel').css('top', topo+'px').fadeIn();
            removetips();
        }
        return false;
    });

    // $('#uploader_div').ajaxupload({
    //     url:baseUrl+'/upload.php',
    //     //editFilename:true,
    //     form:'#uploadform',
    //     remotePath:'uploaded/',
    //     maxFileSize:'3G',
    //     finish:function(files, filesObj){
    //         alert('All files has been uploaded:' + filesObj);
    //     },
    //     success:function(file){
    //         console.log('File ' + file + ' uploaded correctly');
    //     },
    //     beforeUploadAll: function(result) {
    //         console.log(result);
    //     },
    //     beforeUpload: function(filename, fileobj){
    //         if(filename.length>20){
    //             return false; //file will not be uploaded
    //         }else{
    //             return true; //file will be uploaded
    //         }
    //     },
    //     error:function(txt, obj){
    //         alert('An error occour '+ txt);
    //     }
    // });


    setTimeout(function(){$('.ax-file-list').perfectScrollbar();}, 3000);

});

$(window).resize(function(){
    centerContent();
});

var imgNum = 1;
$(document).ready(function() {
    setTimeout(function(){ $.smartbanner(); }, 500);
    var length = $('.bigImages li').length;

    document.cookie="seen_banner=true";

    $('.make-right > i').click(function(){$('.coockie-accept').remove();});

    $( ".friend-email-scroll > input" ).focus(function(){
        if($(".friend-email-block .btn-warning").length == 0){
            $(".friend-email-block").append('<div class="btn btn-warning">+ Add more friends</div>');
        }
    }).focusout(function() {
        if($( ".friend-email-scroll > input" ).val() ==''){
            $(".friend-email-block").remove('.btn.btn-warning');
        }
    });

    $( "body" ).on( "click", ".closeli", function() {
        var index = $(this).parent('li').index();
        $('.files li').eq(index).remove();
        $('.more li').eq(index).remove();
    });

    $(document).on( "click", ".friend-email-block .btn-warning", function() {
        if($('.add_more_email > input:last-child').val() != '' && $('.friend-email-scroll > input').val() != ''){
            $( ".friend-email-block .add_more_email").append('<input type="text" value="" name="friend_email[]" placeholder="Friend\'s Email">');
            $(".friend-email-block .friend-email-scroll").scrollTop( $( ".friend-email-block .friend-email-scroll" ).prop( "scrollHeight" ) );
            $(".friend-email-block .friend-email-scroll").perfectScrollbar('update');
        }

    });

    $('.info').click(function(){
        $('.info-overlay').fadeIn('fast', function() {
            $('.gurutransfer').hide();
        });
    });

    $('.info-overlay').click(function(){
        $('.info-overlay').fadeOut('fast', function() {
            $('.gurutransfer').show();
        });
    });

    $('.info-overlay').click(function(){
        $('.info-overlay').fadeOut('fast', function() {
            $('.gurutransfer').show();
        });
    });

    $('.share').click(function(){
        if($('.share-option').width() == 110){
            $('.share-option').animate({ width: 0 }, 'fast');
        }else{
            $('.share-option').animate({ width: 110 }, 'fast');
        }
    });

    $('.addpassword').click(function(){
        $('.addpassword').toggleClass('active');
        if($(".password-block").height() > 1){
            $(".password-block").css('box-shadow', '0 0 0 0 #333');
            $(".password-block").animate({
                height: "0"
            }, 500, function() {
                // Animation complete.
            });
        }else{
            $(".password-block").css('box-shadow', '0 0 3px 0 #333');
            $(".password-block").animate({
                height: "15%"
            }, 500, function() {
                // Animation complete.
            });
        }
    });

    $('#openedblock').val('email-block');
    $('.share-option li').click(function(){
        var clickpanel = $(this).attr('data-for');
        var opened = $('#openedblock').val();
        if(opened != clickpanel){
            resetforms();
            $('.share-option li').removeClass('active');
            $(this).addClass('active');

            $('.'+opened).fadeOut('fast', function() {
                $('.'+clickpanel).fadeIn('fast', function() {
                    $('#openedblock').val(clickpanel);
                    $('.share-option').width(0);
                });
            });
        }
    });

    $('.connect-with-facebook').click(function(){
        var lightboxdata = $('.connect-facebook').html();
        $('.connect-facebook').html('');
        generatelightbox('connect-facebook', lightboxdata);
        return false;
    });

    
    $('.download-btn').click(function(){
        var t = 0;
        idmy = setInterval(function () {
            $(".download2 .c100").addClass("p"+t);
            t = t + 1;
        },7);

        setTimeout(function(){ download() }, 1100);
    });

    var t = 0;
    $('.download-btn-password').click(function(){
        if($('#password_enter').val() != $('#password_value').val()){
            $('#tip_panel').show();
        }else{
            $('.transfer-list').hide();
            $('.firstnot').show();
            $('#tip_panel').hide();
            $('.status.download2').height($('.c100').height() + $('.transfer-done').height() + $('.friend-password-block').height()+130);
            idmy = setInterval(function () {
                $(".download2 .c100").addClass("p"+t);
                t = t + 1;
            },7);
           
            var downloadalllink = $('.download-btn-password > a').attr('data-href');
            var id = $('.download-btn-password > a').attr('data-hisid');
            setTimeout(function(){ download(); window.open($('.download-btn-password > a').attr('data-href'),'_self'); return false; }, 1100);
            //setTimeout(function(){ download(); loaddownlaoddata(id, downloadalllink, 'downloadpage'); return false; }, 1100);
        }
    });

    $('.download-btn-password-list').click(function(){
        if($('#password_enter').val() != $('#password_value').val()){
            $('#tip_panel').show();
        }else{
            $('#tip_panel').hide();
            var downloadalllink = $('.download-btn-password-list > a').attr('data-href');
            var id = $('.download-btn-password-list > a').attr('data-hisid');
            setTimeout(function(){ window.open($('.download-btn-password-list > a').attr('data-href'),'_self'); return false; }, 1000);
        }
    });

    $(document).on( "click", ".light-box-close, .lightbox-overlay", function() {
        var classname = $('.lightbox').attr('data-for');
        $('.'+classname).html($('.lightbox .loadcontent').html());
        $('.lightbox').remove();
    });

    $('#feedback').submit(function(){
        var count = 0;
        if($('#name').val()==''){
            count =1;
            alert('Please enter name');
        }else if($('#email').val()==''){
            count =1;
            alert('Please enter an email');
        }else if(isEmailAddress($('#email').val())==false){
            count =1;
            alert('Please enter valid email');
        }else if($('#feedback').html()==''){
            count =1;
            alert('Please enter feedback');
        }
        if(count == 0){
            feedbackform(this);
        }
        return false;
    });

    $('#headerMenu').click(function(){
        if($(this).find('.bar').hasClass('animate')){
            $(this).find('.bar').removeClass('animate');
            $(this).removeClass('active');
            $( ".bars" ).animate({
                right: "10",
            }, 500);
            
            $( ".left-nav" ).animate({
                right: "-300",
            }, 500, function() {
                $('#disabledBg').remove();
            });
        }else{
            $(this).find('.bar').addClass('animate');
            $(this).addClass('active');
            $( ".bars" ).animate({
                right: "300",
            }, 500);
            $( ".left-nav" ).animate({
                right: "0",
            }, 500, function() {
                $('body').append('<div id="disabledBg" class="darkDisabledBg"></div>');
            });
        }
        
    });

    // $('#passwordupload').keyup(function(){
    //     checkcount();
    // });
    

    fbandtwitter();
    doSlideshow(length);
});


function download(){
    $(".download2 .c100").addClass("p100");
    $('.tickmark.show').html('<div class="checkmark"><div class="checkmark_stem"></div><div class="checkmark_kick"></div></div>');
    $('.transfer-done h3').html('Downloading...');
    $('.transfer-done .info').remove();
    $('.friend-password-block').remove();
    $('.status.download2').height($('.c100').height() + $('.transfer-done').height() + $('.friend-password-block').height()+170);
    //$('.download-btn-password > a').attr('disabled','disabled');
    clearInterval(idmy);
}

function uploadfinish(results){
    var bar = $('.c100');
    bar[0].className = bar[0].className.replace(/\bp.*?\b/g, '');
    bar.addClass('p100');
    $('.button .files').html('');
    $('#uploadform')[0].reset();
    $('.status').height($('.transferbody').height()-10);
    $('.c100 > span.loading').hide();
    $('.c100 > span.tickmark').show();
    $('.transfer-done .transfer').html('Transfer Complete');
    $('.ax-file-list li').remove();
    $('.status').height($('.transferbody').height()+4);
    $('.transfer-again').removeClass('hide');
    if($('#openedblock').val() == 'link-block'){
        $('.transfer-done .small').html('<div class="small-text">Copy your Download Link</div><input type="text" value="'+results.data.file+'">');
        $('.status').height($('.transfer-done').height()+50);
    }else{
        $('.transfer-done .small').html('You did it! Expect a confirmation email in your inbox shortly.');
    }
    $('.sharepage').show();
}


function progressbar(total){
    var bar = $('.c100');
    var percent = $('.loading');
    var percentComplete = 0;
    var i = 0;
    var htmlstr = '';
    $(".ax-progress-info").each(function( index ) {
        var str = $( this ).text();
        if(str == ''){
            htmlstr = $( this ).text();
        }
        percentComplete = percentComplete + parseInt(str, 10);
        i++;
    });

    if(isNaN(percentComplete)){
        percentComplete = 0;
        $('.transfer-done .transfer').html('Error');
        $('.transfer-done .small').html(htmlstr+', Please <a href="'+baseUrl+'">click here</a> to try again');
        return false;
    }else{
        percentComplete = percentComplete/$(".ax-progress-info").length;
    }


    //console.log("percentage complete: "+percentComplete);
    //return false;

    //uploadProgress: function(event, position, total, percentComplete) {
    $('.button .files').html('');
    $('.status').height($('.transferbody').height()-10);

    bar[0].className = bar[0].className.replace(/\bp.*?\b/g, '');
    bar.addClass('p0');
    bar.removeClass('p100');
    //percentComplete = Math.round((percentComplete - 25)*1.33);

    var pVel = parseInt(percentComplete) + '%';
    bar.removeClass('p'+percentComplete);
    bar.addClass('p'+percentComplete);
    percent.html(pVel);
    complete = (total*percentComplete)/100;


    html = formatSizeUnits(complete)+' of '+formatSizeUnits(total);
    $('.transfer-done .small').html(html);
}

function isEmailAddress(str) {
   var pattern =/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
   return pattern.test(str);  // returns a boolean
}



function resetforms(){
    $('.files').html('');
    $('.add_more_email').html('');
    $('.friend-email-block > input, .my-email-block > input, .message > textarea, .button_area_new > input, .files > input').val('');
}

function doSlideshow(length) {
    if(length>1){
    if(imgNum == 1){
        cclass = '.bigImages li:first-child';
    }else{
        cclass = '.bigImages li:nth-child('+(imgNum-1)+')';
    }
    $(cclass).fadeOut('slow', function() {
        if(imgNum == 1){
            $('.bigImages li:nth-child('+length+')').hide();
            $('.bigImages li:first-child').fadeIn('slow');
        }else{
            $('.bigImages li:nth-child('+imgNum+')').fadeIn('slow');
        }

        imgNum++;
        if (imgNum == length+1) { imgNum = 1; }
        setTimeout('doSlideshow('+length+')', 1800000);
    });
    }
}

function centerContent()
{
    $('.slider').height($(window).height()+22);
    var content = $('.gurutransfer');
    //content.css("left", (container.width()-content.width())/2);
    //content.css("top", ($(window).height()-content.height())/2);
    $('.overlay-data').css("top", ($(window).height()-content.height())/2 - 42);
}



function formatSizeUnits($bytes){
    if ($bytes >= 1073741824){
        $bytes = ($bytes / 1073741824).toFixed(1) + ' GB';
    }else if ($bytes >= 1048576){
        $bytes = ($bytes / 1048576).toFixed(1) + ' MB';
    }else if ($bytes >= 1024){
        $bytes = ($bytes / 1024).toFixed(1) + ' KB';
    }else if ($bytes > 1){
        $bytes = $bytes + ' bytes';
    }else if ($bytes == 1){
        $bytes = $bytes + ' byte';
    }else{
        $bytes = '0 bytes';
    }
    return $bytes;
}

function removetips(){
    setTimeout(function(){ $('.nofiles').fadeOut(); }, 2500);
}

function generatelightbox(dataclass, content){
    var html = '<div class="lightbox '+dataclass+'" data-for="'+dataclass+'"><div class="lightbox-content"><div class="light-box-close"><i class="fa fa-close"></i></div><div class="loadcontent">'+content+'</div></div><div class="lightbox-overlay"></div></div>';
    $('body').append(html);
}

function LodingAnimate(){
    $("#LoginButton").hide();
    $("#results").html('<img src="'+baseUrl+'/img/ajax-loader.gif" />&nbsp;&nbsp;&nbsp;Please Wait Connecting...');
}

function ResetAnimate(){
    document.location.reload();
    $("#LoginButton").show();
    $("#results").html('');
}

function CallAfterLogin(){
    FB.login(function(response) {
        if (response.status === "connected")
        {
            LodingAnimate();
            var access_token = FB.getAuthResponse()['accessToken'];
            FB.api('/me?fields=email,picture,first_name,last_name,hometown,location,gender', function(data) {
                //console.log(data); return false;
                if(data.email == null){
                    alert("You must allow us to access your email id!");
                    ResetAnimate();
                }else{
                    var hometown = '';
                    if(data.hometown != undefined){
                        hometown = data.hometown.name;
                    }

                    var location = '';
                    if(data.location != undefined){
                        location = data.location.name;
                    }
                    AjaxResponse(access_token, hometown, location, data.first_name, data.last_name, data.gender, data.email, data);
                }
            });
        }
    },
    {scope: server_variables.fbPermissions});
}


function AjaxResponse(access_token, hometown, location, first_name, last_name, gender, email, data){
    $.ajax( {
        url:baseUrl+'/index/facebooklogin/'+milliseconds,
        type:'POST',
        data: 'access_token='+access_token+'&hometown='+hometown+'&location='+location+'&first_name='+first_name+'&last_name='+last_name+'&gender='+gender+'&email='+email+'&facebook_id='+data.id,
        success:function(data) {
            var results = eval( '(' + data + ')' );
            if(results.response != 200){
                alert('There is some error in login. Please Try again.');
            }
            ResetAnimate();
        }
    });
}

function feedbackform(elem){
    $.ajax( {
        url:$(elem).attr('action')+'/'+milliseconds,
        type:'POST',
        data: $(elem).serialize(),
        success:function(data) {
            var lightboxdata = '<div class="msg-box">Thanks!! We are happy to hear from you.We will contact you over email in case of questions, if any. You can also share this news with your friends and tell them you care. Happy transferring!!<div class="clearfix"></div><a href="javascript: void(0)" onClick="window.open(\'http://www.facebook.com/sharer/sharer.php?u=https://www.gurutransfer.com\',\'sharer\',\'toolbar=0,status=0,width=580,height=325\');"><div class="facebook-box"><i class="fa fa-facebook"></i> Share on Facebook</div></a><div class="clearfix"></div><div class="center">Why not share this news with your friends and let them know you care!</div></div>';
            $('.feedback-confirm').html('');

            var html = '<div class="lightbox"><div class="lightbox-content feedback-pro no-padding"><div class="pro-container"><div class="header">Guru Transfer pro</div><div class="loadcontent">'+lightboxdata+'</div><div class="footer"></div></div></div><div class="lightbox-feedback"></div></div>';
            $('.section .container .content.row').html(lightboxdata);
        }
    });
}


function fbandtwitter(){
    window.fbAsyncInit = function() {
    FB.init({
      appId      : server_variables.facebook_app_id,
      xfbml      : true,
      version    : 'v2.5'
    });
    };

    (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
}


function loaddownlaoddata(id, downloadalllink, dclass){
    var lightboxdata = '<div class="loader text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></div>';
    generatelightbox(dclass, lightboxdata);
    centerIt($('.'+dclass+' .lightbox-content'));
    $.ajax({
        type: 'POST',
        url: baseUrl+'/index/getiddetail',
        data: 'hisid='+id+'&downloadalllink='+downloadalllink,
        success: function(results) {
            $('.loadcontent').html(results);
            centerIt($('.'+dclass+' .lightbox-content'));
        }
    });    
}


function centerIt(el) {
    if (el.length > 0) {
        var moveIt = function () {
            var winWidth = $(window).width();
            var winHeight = $(window).height();
            el.css("position","absolute").css("left", ((winWidth / 2) - (el.width() / 2)) + "px").css("top", ((winHeight / 2) - (el.height() / 2) + $(window).scrollTop()) + "px");
        }; 
        $(window).resize(moveIt);
        moveIt();
    }
}

function checkcount(){
    if($('#countremain').val() <= 0){
        var topo = ($('.button .more > li:last-child').offset().top)/2;
        $('#info_panel h3').html('Doh!');
        $('#info_panel p').html('You have used your max password limit. <a href="'+baseUrl+'/plans" style="text-decoration:underline; color:#fff">Click here</a> to upgrade your plan');
        $('#info_panel').css('top', topo+'px').fadeIn();
        setTimeout(function(){ $('.nofiles').fadeOut(); }, 5000);
    }
}


