<!DOCTYPE html>
<html>
	<head>
		<title>Real Estate</title>
		<link rel="stylesheet" href="<?= base_url(); ?>application/static/css/normalize.css"/>
		<link href="<?= base_url(); ?>application/static/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= base_url(); ?>application/static/css/jquery.bxslider.css" rel="stylesheet"/>
		<link href="<?= base_url(); ?>application/static/css/style.css" rel="stylesheet"/>
	</head>
	<body class="frontend">

		<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 top_row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<a href="<?= base_url(); ?>home"><img src="<?= base_url(); ?>application/static/images/real_estate/logo.png" alt="" class=""></a>
			</div>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0;">
			<nav class="navbar navbar-default top">
	    	    <div class="container-fluid">
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0;">
			            <div>
			            	<div class="row menu">
			                	<ul class="nav navbar-nav col-lg-9 col-md-9 col-sm-9 col-xs-12">
						            <li class="col-lg-2 col-md-3 col-sm-3 col-xs-3 col-lg-offset-5 col-md-offset-3 col-sm-offset-3 col-xs-offset-2 text-center"><a class="menu_link" href="<?= base_url(); ?>home">HOME</a></li>
						            <li class="col-lg-2 col-md-3 col-sm-3 col-xs-3 text-center"><a class="menu_link" style="cursor:default;" href="">PROJECTS</a>
						            	<ul>
							            	<?php foreach($array as $project): ?>
												<li><a href="<?= base_url().'project/'.$project[0];?>"><?php echo $project[0]; //echo $project[1]; ?></a></li>
											<?php endforeach ?>
										</ul>
						            </li>
						            <li class="col-lg-2 col-md-3 col-sm-3 hidden-xs text-center"><a class="current_link" href="">CONTACT US</a></li>
						            <li class="col-xs-3 visible-xs text-center"><a class="current_link" href="">CONTACT US</a></li>
						        </ul>
						        <div class="col-sm-3 col-md-3 pull-right">
			            	</div>
			            </div>
			        </div> 
	    	    </div>
	    	</nav>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="section col-lg-12 col-md-12 visible-lg visible-md">
				<div class="col-lg-12 col-md-12" style="padding:0; margin-bottom:5%;">
				<h3 class="arabic">مشاريع</h3>
				<div class="image_left col-lg-12 col-md-12" style="padding:0;">
					<img style="padding:0; margin-top: 5%;" class="img-responsive col-lg-12 col-md-12" src="<?= base_url(); ?>application/static/images/real_estate/project1.jpg">
					<div class="type_left"><p><a class="left_link" href="<?= base_url().'project/rayos';?>">RAYOS</a></p></div>
				</div>
				<div class="image_left col-lg-12 col-md-12" style="padding:0;">
					<img style="padding:0; margin-top: 5%;" class="img-responsive col-lg-12 col-md-12" src="<?= base_url(); ?>application/static/images/real_estate/project2.jpg">
					<div class="type_left"><p><a class="left_link" href="<?= base_url().'project/sahrawy';?>">SAHRAWY</a></p></div>
				</div>
				<div class="image_left col-lg-12 col-md-12" style="padding:0;">
					<img style="padding:0; margin-top: 5%;" class="img-responsive col-lg-12 col-md-12" src="<?= base_url(); ?>application/static/images/real_estate/project3.jpg">
					<div class="type_left"><p><a class="left_link" href="<?= base_url().'project/rayos';?>">RAYOS</a></p></div>
				</div>
			</div>
			</div>
		</div>

		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 arabic">
			<div class="row">
				<div class="section col-lg-7 col-md-7 visible-lg visible-md">
					<h3>راسلنا</h3>
					<form action="" method="POST">
						<input class="contact_input col-lg-12 col-md-12" type="text" name="name" placeholder="الاسم">
						<input class="contact_input col-lg-12 col-md-12" type="text" name="company" placeholder="الشركه">
						<input class="contact_input col-lg-12 col-md-12" type="text" name="email" placeholder="البريد الالكتروني">
						<textarea class="contact_textarea col-lg-12 col-md-12" name="msg" rows="4" cols="50" placeholder="الرساله"></textarea>

						<input id="contact_button" type="submit" value="ارسل" name="submitMail">
					</form>
				</div>

				<div class="section col-lg-5 col-md-5 col-sm-12 col-xs-12">
					<h3>اتصل بنا</h3>
					<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 contact_info">
						<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11"><p style="line-height: 200%;">321 321 21 12</p></div>
						<div style="padding:0" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
							<img style="padding:0;" class="img-responsive pull-right" src="<?= base_url(); ?>application/static/images/real_estate/phone.png">
						</div>
					</div>
					<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 contact_info">
						<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11"><p style="line-height: 200%;">321 321 21 12</p></div>
						<div style="padding:0" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
							<img style="padding:0;" class="img-responsive pull-right" src="<?= base_url(); ?>application/static/images/real_estate/mobile.png">
						</div>
					</div>
					<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 contact_info">
						<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11"><p style="line-height: 200%;">الياباني. جوي ونتج ويعزى التقليدي من, و أراض الحربي، والروس</p></div>
						<div style="padding:0" class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
							<img style="padding:0;" class="img-responsive pull-right" src="<?= base_url(); ?>application/static/images/real_estate/location.png">
						</div>
					</div>
				</div>

				<div class="section col-sm-12 col-xs-12 visible-sm visible-xs" style="margin-top:5%;">
					<h3>راسلنا</h3>
					<form action="" method="POST">
						<input class="contact_input col-sm-12 col-xs-12" type="text" name="name" placeholder="الاسم">
						<input class="contact_input col-sm-12 col-xs-12" type="text" name="company" placeholder="الشركه">
						<input class="contact_input col-sm-12 col-xs-12" type="text" name="email" placeholder="البريد الالكتروني">
						<textarea class="contact_textarea col-sm-12 col-xs-12" name="msg" rows="4" cols="50" placeholder="الرساله"></textarea>

						<input id="contact_button" type="submit" value="ارسل" name="submitMail">
					</form>
				</div>
			</div>
			<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0">
				<h3>موقع الشركه</h3>
				<div id="map_canvas_contact"></div>
			</div>
		</div>

		<footer>
			<div class="footer_text hidden-sm hidden-xs col-lg-12 col-md-12" style="padding-left:0; padding-right:0;">
				<div class="col-lg-1 col-md-1 text-center footer_links">
					<a class="frontend" href="">HOME</a>
				</div>
				<div class="col-lg-2 col-md-2 text-center footer_links">
					<a class="frontend" href="<?= base_url(); ?>contact">CONTACT US</a>
				</div>	
				<div class="col-lg-3 col-lg-offset-5 col-md-4 col-md-offset-3">
					<form action="" method="post" name="form">
						<div class="col-lg-8 col-md-8" style="padding:0; color:black">
							<input type="email" name="email" placeholder="YOUR EMAIL" class="subscribe_input rounded" style="text-align:left">
						</div>
						<div class="col-lg-2 col-md-2" style="padding:0;">
							<input type="submit" name="subscribe" value="SUBSCRIBE" class="subscribe_button">
						</div>
					</form>
				</div>		
				<div class="col-lg-1 col-md-2">
					<a href="http://www.twitter.com">
						<img class="img-responsive col-lg-4 col-md-4" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/twitter.jpg">
					</a>
					<a href="http://www.youtube.com">
						<img class="img-responsive col-lg-4 col-md-4" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/youtube.jpg">
					</a>
					<a href="http://www.facebook.com">
						<img class="img-responsive col-lg-4 col-md-4" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/facebook.jpg">
					</a>
				</div>	
			</div>
			<div class="footer_text col-sm-12 col-xs-12 hidden-md hidden-lg">
				<div class="col-sm-6 col-xs-6" style="padding-top: 0.5%;">
					<form action="" method="post">
						<div class="col-sm-8 col-xs-8" style="padding:0;">
							<input type="email" name="email" placeholder="YOUR EMAIL" class="subscribe_input rounded" style="text-align:left">
						</div>
						<div class="col-sm-2 col-xs-2" style="padding:0;">
							<input type="submit" name="subscribe" value="SUBSCRIBE" class="subscribe_button">
						</div>
					</form>
				</div>		
				<div class="col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
					<a href="http://www.twitter.com">
						<img class="img-responsive col-sm-4 col-xs-4" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/twitter.jpg">
					</a>
					<a href="http://www.youtube.com">
						<img class="img-responsive col-sm-4 col-xs-4" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/youtube.jpg">
					</a>
					<a href="http://www.facebook.com">
						<img class="img-responsive col-sm-4 col-xs-4" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/facebook.jpg">
					</a>
				</div>	
			</div>
		</footer>

		<script src="<?= base_url(); ?>application/static/js/jquery.min.js"></script>
		<script src="<?= base_url(); ?>application/static/js/main.js"></script>
		<script src="<?= base_url(); ?>application/static/js/bootstrap.min.js"></script>
		<script src="<?= base_url(); ?>application/static/js/jquery.bxslider.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js"></script>

		<script>
			function initialize() {
			 	var mapCanvas = document.getElementById('map_canvas_contact');
			 	var mapOptions = {
			 		center: new google.maps.LatLng(44.5403, -78.5463),
			 		zoom: 8,
			 		mapTypeId: google.maps.MapTypeId.ROADMAP
			 	}
			 	var map = new google.maps.Map(mapCanvas, mapOptions);
		  	}
		  	google.maps.event.addDomListener(window, 'load', initialize);
		</script>

		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-58024854-1', 'auto');
		  ga('send', 'pageview');

		</script>
	</body>
</html>