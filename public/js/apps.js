var milliseconds = new Date().getTime();
$(window).load(function()
{
    centerContent();
    $('.files').perfectScrollbar();
    $('.friend-email-scroll').perfectScrollbar();

    $( ".add-files-block" ).on( "change", ".files", function() {
        $('.button .files').html('');
        $( ".files" ).each(function( index ) {

            if($( this ).val() != ''){
                var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
                $('.button .files').append('<li>' + filename + '<div class="closeli">x</div></li>');
            }
        });
        var html = $('.upload-more-btn').html();
        $('.button .more .upload-wrap-btn-Change').hide();
        $('.button .more').append('<li>'+html+'</li>');
    });

    $('.status').height($('.transferbody').height()-10);
});

$(window).resize(function(){
    centerContent();
});

var imgNum = 1;
$(document).ready(function() {
    var length = $('.bigImages li').length;
    

    $( ".friend-email-block input" )
    .focus(function(){
        if($(".friend-email-block .btn-warning").length == 0){
            $(".friend-email-block").append('<div class="btn btn-warning">+ Add more friends</div>');
        }
    }).focusout(function() {
        if($(this).val() ==''){
            $(".friend-email-block").remove('.btn-warning');
        }
    });

    $( "body" ).on( "click", ".closeli", function() {
        var index = $(this).parent('li').index();
        $('.files li').eq(index).remove();
        $('.more li').eq(index).remove();
    });

    $(document).on( "click", ".friend-email-block .btn-warning", function() {
        if($('.add_more_email > input:last-child').val() != '' && $('.friend-email-block > input').val() != '')
            $( ".friend-email-block .add_more_email").append('<input type="text" value="" name="friend_email[]" placeholder="Friend\'s Email">');
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
        feedbackform(this);
        return false;
    });

    fbandtwitter();
    doSlideshow(length);
});

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
    content.css("top", ($(window).height()-content.height())/2);
    $('.overlay-data').css("top", ($(window).height()-content.height())/2 - 42);
}

$(function() {
    /* variables */
    var status = $('.status');
    var percent = $('.loading');
    var bar = $('.c100');
    var html ='';
    var setval = 0;
    var opened = $('#openedblock').val();
    /* submit form with ajax request using jQuery.form plugin */
    $('#uploadform').ajaxForm({

        /* set data type json */
        dataType:'posts',
        processData: false,
        contentType: false, 

        /* reset before submitting */
        beforeSubmit: function () {
            var topo = ($('.button .more > li:last-child').offset().top)/2;
            $('.nofiles').fadeOut();

            if(opened == 'link-block'){
                if($('.files > li').length == 0){
                    setval = 1;
                    $('#error_panel').css('top', topo+'px').fadeIn();
                    removetips();
                }else if($('.friend-email-block > input').val() == ''){
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
                }else{
                    setval = 0;
                }
            }else{
                if($('.files > li').length == 0){
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
                return true;
            }
            
        },
        beforeSend: function() {
            $('.status').height($('.transferbody').height()-10);
            status.fadeIn();
            bar.addClass('p0');
            percent.html('0%');
        },

        /* progress bar call back*/
        uploadProgress: function(event, position, total, percentComplete) {
            $('.button .files').html('');
            $('.status').height($('.transferbody').height()-10);
            

            if(percentComplete <= 25){
                var pVel = percentComplete*4 + '%';
                bar[0].className = bar[0].className.replace(/\bp.*?\b/g, '');
                bar.addClass('p'+(percentComplete*4));
                percent.html(pVel);
                complete = 0;
            }else{
                bar[0].className = bar[0].className.replace(/\bp.*?\b/g, '');
                bar.addClass('p0');
                bar.removeClass('p100');
                $('.transfer-done .transfer').html('uplaoding...');
                percentComplete = Math.round((percentComplete - 25)*1.33);
                
                var pVel = percentComplete + '%';
                bar.removeClass('p'+percentComplete-1);
                bar.addClass('p'+percentComplete);
                percent.html(pVel);
                complete = (total*percentComplete)/100;
            }
            html = formatSizeUnits(complete)+' of '+formatSizeUnits(total);
            $('.transfer-done .small').html(html);
        },

        /* complete call back */
        complete: function(data) {
            var results = eval( '(' + data.responseText + ')' );
            $('.button .files').html('');
            $('#uploadform')[0].reset();
            $('.status').height($('.transferbody').height()-10);
            $('.c100 > span.loading').hide();
            $('.c100 > span.tickmark').show();
            $('.transfer-done .transfer').html('Transfer Complete');
            if($('#openedblock').val() == 'link-block'){
                $('.transfer-done .small').html('<div class="small-text">Copy your Download Link</div>');
                for(var i in results.data.file){
                    $('.transfer-done .small').append('<input type="text" value="'+results.data.file[i]+'">');
                }

                $('.status').height($('.transfer-done').height()+10);
            }else{
                $('.transfer-done .small').html('You did it! Expect a confirmation email in your inbox shortly.');
            }
            //status.html(data.responseJSON.count + ' Files uploaded!').fadeIn();
        },
        failure: function(result){
            console.log("FAILED");
            console.log(result);
        }

      });
});



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
            FB.api('/me', function(data) {
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
                    AjaxResponse(access_token, hometown, location);
                }
            });
        }
    },
    {scope: server_variables.fbPermissions});
}


function AjaxResponse(access_token, hometown, location){
    $.ajax( {
        url:baseUrl+'/index/facebooklogin/'+milliseconds,
        type:'POST',
        data: 'access_token='+access_token+'&hometown='+hometown+'&location='+location,
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
            alert('submit');
        }
    });
}


function fbandtwitter(){
    window.fbAsyncInit = function() {
    FB.init({
        appId: server_variables.facebook_app_id,
        cookie: true,xfbml: true,
        oauth: true,
        version: 'v2.4'
        });
    };
    (function() {
    var e = document.createElement('script');
    e.async = true;e.src = '//connect.facebook.net/en_US/all.js';
    document.getElementById('fb-root').appendChild(e);}());

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=117653771586254";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk')); 
}