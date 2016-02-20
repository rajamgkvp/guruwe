<!--All Content Start-->
<div class="wrapper boxstyle">
	
	<!--Page Header Start-->
	<section class="page-header">
		<h1>Contact us</h1>
		<p></p>
	</section>
	<!--Page Header End-->
	
	<!--Map and Details-->
	<section class="box-container">
		
		<!--Page Navigation-->
		<nav class="pagenav">
			<ul>
				<li><a href="<?php echo SITE_URL; ?>">home</a></li>
				<li>contact us</li>
			</ul>
		</nav>
		
		<!--Map-->
		<div class="map-container">
			<div id="map-canvas"></div>
		</div>
		
		<!--Contact Area-->
		<div class="contact-area">
		
				
			<!--Contact Info Start-->
			<div class="contact-info">
				<h2>contact information</h2>
				
				<!--Contact Details-->
				<div class="contact-details">
					<ul>
						<li>address: <span>559 Lilac Lane Statesboro, GA 30458</span></li>
						<li>phone: <span>111-123-456-999</span></li>
						<li>email: <span>info@yourdomain.com</span></li>
					</ul>
				</div>
				
				
				
			</div>
			<!--Contact Info End-->
			
		</div>
		<!--Content Area End-->
		
	</section>
	<!--Map and Details End-->

</div>
<!--All Content End-->

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script>
function initialize() {
"use strict";

  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(-37.817941, 144.964977),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var marker = new google.maps.Marker({
    position: map.getCenter(),
    map: map,
    title: 'Location Name'
  });

  google.maps.event.addListener(marker, 'click', function() {
    map.setZoom(8);
    map.setCenter(marker.getPosition());
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

addClass('container', 'background backimage1');

function addClass(element, myClass) {
    $('.'+element).addClass(myClass);
}
</script>