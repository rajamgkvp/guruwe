var milliseconds = new Date().getTime();
var setinterval;

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
                    }else{
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

    fbandtwitter();
    doSlideshow(length);
});

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

    var pVel = parseInt(percentComplete - 1) + '%';
    bar.removeClass('p'+percentComplete-1);
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
        setTimeout('doSlideshow('+length+')', 5000);
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
    var html = '<div class="lightbox" data-for="'+dataclass+'"><div class="lightbox-content"><div class="light-box-close"><i class="fa fa-close"></i></div><div class="loadcontent">'+content+'</div></div><div class="lightbox-overlay"></div></div>';
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
                    AjaxResponse(access_token, hometown, location, data.first_name, data.last_name, data.gender, data.email);
                }
            });
        }
    },
    {scope: server_variables.fbPermissions});
}


function AjaxResponse(access_token, hometown, location, first_name, last_name, gender, email){
    $.ajax( {
        url:baseUrl+'/index/facebooklogin/'+milliseconds,
        type:'POST',
        data: 'access_token='+access_token+'&hometown='+hometown+'&location='+location+'&first_name='+first_name+'&last_name='+last_name+'&gender='+gender+'&email='+email,
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
