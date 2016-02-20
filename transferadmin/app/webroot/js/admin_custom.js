$(function() {

//===== section for feedback state change=====//

	$("#feedback_state").change(function() {
		
		$("#feedback_load").show();
		var feed_state	=	$(this).val();
		var feed_id		=	$(this).attr('alt');
		var url			=	$('#state_url').val();	
		$.ajax({
			url:url,
			data:{feedback_id:feed_id,feedback_state:feed_state },
			type:'POST',
			success:function(responseText){
				
				jAlert(responseText);
				$("#feedback_load").hide();
			}
		});
		
	});
	
//=====  section for feedback state change=====//
//===== Alert windows =====//



	$(".bAlert").click( function() {

		jAlert('This is a custom alert box. Title and this text can be easily editted', 'Alert Dialog Sample');

	});

	

	$(".bConfirm").click( function() {

		jConfirm('Can you confirm this?', 'Confirmation Dialog', function(r) {

			jAlert('Confirmed: ' + r, 'Confirmation Results');

		});

	});

	

	$(".bPromt").click( function() {

		jPrompt('Type something:', 'Prefilled value', 'Prompt Dialog', function(r) {

			if( r ) alert('You entered ' + r);

		});

	});

	

	$(".bHtml").click( function() {

		jAlert('You can use HTML, such as <strong>bold</strong>, <em>italics</em>, and <u>underline</u>!');

	});





	//===== Accordion =====//		

	

	$('div.menu_body:eq(0)').show();

	$('.acc .head:eq(0)').show().css({color:"#2B6893"});

	

	$(".acc .head").click(function() {	

		$(this).css({color:"#2B6893"}).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");

		$(this).siblings().css({color:"#404040"});

	});

	

	

	

	





	

	//===== Form elements styling =====//

	

	$('form').jqTransform({imgPath:'../images/forms'});

	

	

	//===== Form validation engine =====//



	$("#valid").validationEngine();

	





	//===== Information boxes =====//

		

	$(".hideit").click(function() {

		$(this).fadeOut(400);

	});

	



	

	

	//===== Autofocus =====//	

	

	$('.autoF').focus();





	

	//===== Placeholder for all browsers =====//

	

	$("input").each(

		function(){

			if($(this).val()=="" && $(this).attr("placeholder")!=""){

			$(this).val($(this).attr("placeholder"));

			$(this).focus(function(){

				if($(this).val()==$(this).attr("placeholder")) $(this).val("");

			});

			$(this).blur(function(){

				if($(this).val()=="") $(this).val($(this).attr("placeholder"));

			});

		}

	});





	

});