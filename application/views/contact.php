<!DOCTYPE html>
<html>
	<head>
		<title>Real Estate</title>
		<link rel="stylesheet" href="<?= base_url(); ?>application/static/css/normalize.css"/>
		<link href="<?= base_url(); ?>application/static/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= base_url(); ?>application/static/css/jquery.bxslider.css" rel="stylesheet"/>
		<link href="<?= base_url(); ?>application/static/css/style.css" rel="stylesheet"/>
	</head>
	<body>

		<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12 top_row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<img src="<?= base_url(); ?>application/static/images/real_estate/logo.png" alt="" class="img-responsive">
			</div>
			<div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1 col-sm-6 col-sm-offset-1 col-xs-6 col-xs-offset-1" style="background-color:grey; height:80px; width:60%;">
			</div>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0;">
			<nav class="navbar navbar-default top">
	    	    <div class="container-fluid">
	    	        <div class="navbar-header">
	    	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	    	              <span class="sr-only">Toggle navigation</span>
	    	              <span class="icon-bar"></span>
	    	              <span class="icon-bar"></span>
	    	              <span class="icon-bar"></span>
	    	            </button>
	    	        </div>     
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0;">
			            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			            	<div class="row menu">
			                	<ul class="nav navbar-nav col-lg-9 col-md-9 col-sm-9 col-xs-12">
						            <li class="col-lg-1 col-md-1 col-sm-2 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-1 text-center"><a href="">HOME</a></li>
						            <li class="col-lg-1 col-md-1 col-sm-2 col-xs-12 text-center">PROJECTS</li>
						            <li class="col-lg-1 col-md-1 col-sm-2 col-xs-12 text-center"><a href="<?= base_url(); ?>sahrawy">SAHRAWY</a></li>
						            <li class="col-lg-1 col-md-1 col-sm-2 col-xs-12 text-center">RAYOS</li>
						            <li class="col-lg-1 col-md-1 col-sm-2 hidden-xs text-center" style="width: 10%;">CONTACT US</li>
						            <li class="col-xs-12 visible-xs text-center">CONTACT US</li>
						        </ul>
						        <div class="col-sm-3 col-md-3 pull-right">
						        <form class="navbar-form" role="search" style="margin: 0;">
							        <div class="input-group">
							            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
							            <div class="input-group-btn">
							                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							            </div>
							        </div>
						        </form>
			            	</div>
			            </div>
			        </div> 
	    	    </div>
	    	</nav>
		</div>

		<div class="col-lg-3 col-md-3">
			<div class="section col-lg-12 col-md-12 visible-lg visible-md">
				<div class="col-lg-12 col-md-12" style="padding:0">
					<h3>مشاريع أخرى</h3>
					<img style="padding:0; margin-top: 5%;" class="img-responsive col-lg-12 col-md-12" src="<?= base_url(); ?>application/static/images/real_estate/project1.jpg">
					<div class="image_left col-lg-12 col-md-12" style="padding:0;">
						<img style="padding:0; margin-top: 5%;" class="img-responsive col-lg-12 col-md-12" src="<?= base_url(); ?>application/static/images/real_estate/project2.jpg">
						<div class="type_left"><p>اسم المشروع</p></div>
					</div>
					<img style="padding:0; margin-top: 5%;" class="img-responsive col-lg-12 col-md-12" src="<?= base_url(); ?>application/static/images/real_estate/project3.jpg">
				</div>
			</div>
		</div>

		<div class="col-lg-9 col-md-9">
			<div class="row">
				<div class="section col-lg-7 col-md-7 visible-lg visible-md">
					<h3>راسلنا</h3>
					<form action="" method="POST">
						<input class="contact_input col-lg-12 col-md-12" type="text" name="name" placeholder="الاسم">
						<input class="contact_input col-lg-12 col-md-12" type="text" name="company" placeholder="الشركه">
						<input class="contact_input col-lg-12 col-md-12" type="text" name="email" placeholder="البريد الالكتروني">
						<textarea class="contact_textarea col-lg-12 col-md-12" rows="6" cols="50" placeholder="الرساله"></textarea>

						<input id="contact_button" type="submit" value="ارسل">
					</form>
				</div>

				<div class="section col-lg-5 col-md-5 visible-lg visible-md">
					<h3>اتصل بنا</h3>
					<div class="row col-lg-12 col-md-12 contact_info">
						<div class="col-lg-10 col-md-10"><p style="line-height: 200%;">321 321 21 12</p></div>
						<div style="padding:0" class="col-lg-2 col-md-2">
							<img style="padding:0;" class="img-responsive pull-right" src="<?= base_url(); ?>application/static/images/real_estate/phone.png">
						</div>
					</div>
					<div class="row col-lg-12 col-md-12 contact_info">
						<div class="col-lg-10 col-md-10"><p style="line-height: 200%;">321 321 21 12</p></div>
						<div style="padding:0" class="col-lg-2 col-md-2">
							<img style="padding:0;" class="img-responsive pull-right" src="<?= base_url(); ?>application/static/images/real_estate/mobile.png">
						</div>
					</div>
					<div class="row col-lg-12 col-md-12 contact_info">
						<div class="col-lg-10 col-md-10"><p style="line-height: 200%;">الياباني. جوي ونتج ويعزى التقليدي من, و أراض الحربي، والروس</p></div>
						<div style="padding:0" class="col-lg-2 col-md-2">
							<img style="padding:0;" class="img-responsive pull-right" src="<?= base_url(); ?>application/static/images/real_estate/location.png">
						</div>
					</div>
				</div>
			</div>
			<div class="row col-lg-12 col-md-12" style="padding:0">
				<h3>موقع الشركه</h3>
				<div id="map_canvas_contact"></div>
			</div>
		</div>

		<footer>
			<div class="footer_text hidden-sm hidden-xs col-lg-12 col-md-12" style="padding-left:0; padding-right:0;">
				<div class="col-lg-1 col-md-1 text-center" style="cursor: pointer; padding:0;">
					<a href="">HOME</a>
				</div>
				<div class="col-lg-1 col-md-1 text-center" style="cursor: pointer; padding:0;">
					PROJECTS
				</div>
				<div class="col-lg-1 col-md-1 text-center" style="cursor: pointer; padding:0;">
					<a href="<?= base_url(); ?>sahrawy">SAHRAWY</a>
				</div>
				<div class="col-lg-1 col-md-1 text-center" style="cursor: pointer; padding:0;">
					RAYOS
				</div>
				<div class="col-lg-1 col-md-1 text-center" style="cursor: pointer; padding:0;">
					CONTACT US
				</div>	
				<div class="col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3">
					<form action="" method="post">
						<div class="col-lg-8 col-md-8" style="padding:0;">
							<input type="email" name="email" placeholder="YOUR EMAIL" class="subscribe_input rounded">
						</div>
						<div class="col-lg-2 col-md-2" style="padding:0;">
							<input type="submit" name="subscribe" value="SUBSCRIBE" class="subscribe_button">
						</div>
					</form>
				</div>		
				<div class="col-lg-1 col-md-1">
					<img class="img-responsive col-lg-4 col-md-4" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/twitter.jpg">
					<img class="img-responsive col-lg-4 col-md-4" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/youtube.jpg">
					<img class="img-responsive col-lg-4 col-md-4" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/facebook.jpg">
				</div>	
			</div>
			<div class="footer_text col-sm-12 col-xs-12 hidden-md hidden-lg">
				<div class="col-sm-6 col-xs-6" style="padding-top: 0.5%;">
					<form action="" method="post">
						<div class="col-sm-8 col-xs-8" style="padding:0;">
							<input type="email" name="email" placeholder="YOUR EMAIL" class="subscribe_input rounded">
						</div>
						<div class="col-sm-2 col-xs-2" style="padding:0;">
							<input type="submit" name="subscribe" value="SUBSCRIBE" class="subscribe_button">
						</div>
					</form>
				</div>		
				<div class="col-sm-3 col-sm-offset-3 col-xs-3 col-xs-offset-3">
					<img class="img-responsive col-sm-3 col-xs-3" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/twitter.jpg">
					<img class="img-responsive col-sm-3 col-xs-3" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/youtube.jpg">
					<img class="img-responsive col-sm-3 col-xs-3" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/images/real_estate/facebook.jpg">
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
	</body>
</html>