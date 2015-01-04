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
				<a href="<?= base_url(); ?>home"><img src="<?= base_url(); ?>application/static/images/real_estate/logo.png" alt="" class="img-responsive"></a>
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
						            <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12 col-lg-offset-5 col-md-offset-5 col-sm-offset-1 text-center"><a class="menu_link" href="<?= base_url(); ?>home">HOME</a></li>
						            <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center"><a class="current_link" style="cursor:default;" href="">PROJECTS</a>
						            	<ul>
							            	<?php foreach($array as $project): ?>
												<li><a href="<?= base_url().'project/'.$project[0];?>"><?php echo $project[0]; //echo $project[1]; ?></a></li>
												<?php if($unit->project_id == $project[1]){
													$project_lat = $project[2];
													$project_long = $project[3];
													} ?>
											<?php endforeach ?>
										</ul>
						            </li>

						            <li class="col-lg-2 col-md-2 col-sm-2 hidden-xs text-center"><a class="menu_link" href="<?= base_url(); ?>contact">CONTACT US</a></li>
						            <li class="col-xs-12 visible-xs text-center"><a class="menu_link" href="<?= base_url(); ?>contact">CONTACT US</a></li>
						        </ul>
						        <div class="col-sm-3 col-md-3 pull-right">
						        <!-- <form class="navbar-form" role="search" style="margin: 0;">
							        <div class="input-group">
							            <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
							            <div class="input-group-btn">
							                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							            </div>
							        </div>
						        </form> -->
			            	</div>
			            </div>
			        </div> 
	    	    </div>
	    	</nav>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h3 style="text-align:right"><?php echo $unit->title; ?></h3></div>

		<div class="section col-lg-3 col-md-3 visible-lg visible-md">

			<div class="col-lg-12 col-md-12 arabic" style="padding:0">
				<h3>الموقع</h3>
				<p>اعتداء وبريطانيا جوي أن. مع هنا شدّت الموسوعة جُل, فاتّبع أوروبا الأرواح أضف عل. كل مشارف وفرنسا يتم</p>
			</div>

			<div class="col-lg-12 col-md-12 arabic" style="padding:0">
				<h3>الخريطة</h3>
				<div id="map-canvas"></div>
			</div>

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

		<div class="section col-lg-9 col-md-9 visible-lg visible-md">
			<?php if(!empty($images)):?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:5%; margin-left:0; margin-right:0; padding:0;">
					<ul class="bxslider">
					
					<?php foreach($images as $image): ?>
						<li><img src="<?= base_url(); ?>application/static/upload/units/<?php echo $image->image; ?>" style="max-height:400px;"/></li>
					<? endforeach ?>
					</ul>		
				</div>
			<?php endif?>

			<div class="col-lg-12 col-md-12 arabic" style="padding:0; margin-bottom:5%;">
				<h3>تفاصيل الإعلان</h3>
				<table style="width:100%">
					<tr>
						<td class="light">شقه</td> 
						<td class="right_col dark">النوع</td>
					</tr>
					<tr>
						<td class="dark"><?php echo $unit->floor; ?></td>
						<td class="right_col light">الطابق</td> 
					</tr>
					<tr>
						<td class="light"><?php echo $unit->rooms; ?></td>
						<td class="right_col dark">الغرف</td> 
					</tr>
					<tr>
						<td class="dark"><?php echo $unit->bathrooms; ?></td>
						<td class="right_col light">الحمامات</td> 
					</tr>
					<tr>
						<td class="light">متر<?php echo $unit->area; ?></td>
						<td class="right_col dark">المساحة</td> 
					</tr>
					<tr>
						<td class="dark"><?php echo $unit->finishing; ?></td>
						<td class="right_col light">التشطيب</td> 
					</tr>
				</table>
			</div>

			<div class="col-lg-12 col-md-12 arabic" style="padding:0">
				<h3>عن الوحده</h3>
				<p><?php echo $unit->description; ?></p>
			</div>

			<div class="col-lg-12 col-md-12 arabic" style="padding:0">
				<?php if(!sizeof($units) == 1):?>
				<h3>وحدات شبيهه</h3>
				<?php foreach($units as $u): 
					if($unit->id != $u->id):
						foreach($unit_images as $unit_image):
							if($unit_image[0] == $u->id):
								$featured_unit_image = $unit_image[1]; break;
							endif;
						endforeach?>
						<div class="image col-lg-3 col-md-3">
							<img class="img-responsive" src="<?= base_url(); ?>application/static/upload/units/<?php echo $featured_unit_image ?>">
							<div class="type"><p>للبيع</p></div>
							<div class="price">
								<p><?php echo $unit_image[2]; ?></p>
								<p>
									<span><?php echo $u->area; ?></span>
									<span>متر</span>
									<span>&nbsp;&nbsp;&nbsp;<?php echo $u->rooms; ?></span>
									<span>غرف</span>
								</p>
								<p>
									<span style="color:red"><?php echo $u->price; ?></span>
									<span>جنيه</span>
								</p>
								<button type="button" onclick="window.location.href='<?= base_url().'unit/' ?><?php echo $unit->title; ?>'">التفاصيل</button>
							</div>
						</div>
				<?php endif;
				endforeach;
				else: ?>
				<?php endif ?>
				</div>

			</div>
		</div>



		<footer>
			<div class="footer_text hidden-sm hidden-xs col-lg-12 col-md-12" style="padding-left:0; padding-right:0;">
				<div class="col-lg-1 col-md-1 text-center footer_links">
					<a class="frontend" href="<?= base_url(); ?>home">HOME</a>
				</div>
				<!-- <div class="col-lg-1 col-md-1 text-center footer_links">
					<a class="frontend" class="frontend" href="">PROJECTS</a>
				</div> -->

				<div class="col-lg-1 col-md-1 text-center footer_links">
					<a class="frontend" href="<?= base_url(); ?>contact">CONTACT US</a>
				</div>	
				<div class="col-lg-3 col-lg-offset-6 col-md-3 col-md-offset-6">
					<form action="" method="post">
						<div class="col-lg-8 col-md-8" style="padding:0;">
							<input type="email" name="email" placeholder="YOUR EMAIL" class="subscribe_input rounded" style="text-align:left">
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
							<input type="email" name="email" placeholder="YOUR EMAIL" class="subscribe_input rounded" style="text-align:left">
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
				var projectLatlng = new google.maps.LatLng(<?php echo($project_lat);?>, <?php echo($project_long);?>);
			 	var mapCanvas = document.getElementById('map-canvas');
			 	var mapOptions = {
			 		center: new google.maps.LatLng(<?php echo($project_lat);?>, <?php echo($project_long);?>),
			 		zoom: 8,
			 		mapTypeId: google.maps.MapTypeId.ROADMAP
			 	}
			 	var map = new google.maps.Map(mapCanvas, mapOptions);

			 	var marker = new google.maps.Marker({
			        position: projectLatlng, 
			        map: map,
			        title:"<?php echo $unit->title;?>"
			    });  
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