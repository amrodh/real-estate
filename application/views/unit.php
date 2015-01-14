<!DOCTYPE html>
<html>
	<head>
		<title>Real Estate</title>
		<meta charset="utf-8">
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
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0;">
			<nav class="navbar navbar-default top">
	    	    <div class="container-fluid">  
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0;">
			            <div>
			            	<div class="row menu">
			                	<ul class="nav navbar-nav col-lg-12 col-md-12 col-sm-12 col-xs-12">
						            <li class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 text-center"><a class="menu_link" href="<?= base_url(); ?>home">HOME</a></li>
						            <li class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center"><a class="current_link" style="cursor:default;" href="">PROJECTS</a><div class="current_link_arrow_proj"></div>
						            	<ul>
							            	<?php foreach($array as $project): ?>
												<li><a href="<?= base_url().'project/'.$project[0];?>"><?php echo $project[0]; ?></a></li>
												<?php if($unit->project_id == $project[1]){
													$project_lat = $project[2];
													$project_long = $project[3];
													} ?>
											<?php endforeach ?>
										</ul>
						            </li>
						            <li class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center"><a class="menu_link" href="<?= base_url(); ?>findyourhome">FIND YOUR HOME</a></li>
						            <li class="col-lg-2 col-md-2 col-sm-2 hidden-xs text-center"><a class="menu_link" href="<?= base_url(); ?>contact">CONTACT US</a></li>
						            <li class="col-xs-3 visible-xs text-center"><a class="menu_link" href="<?= base_url(); ?>contact">CONTACT US</a></li>
						        </ul>
						        <div class="col-sm-3 col-md-3 pull-right">
			            	</div>
			            </div>
			        </div> 
	    	    </div>
	    	</nav>
		</div>

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h3 style="text-align:right"><?php echo $unit->title; ?></h3></div>

		<div class="section col-lg-4 col-md-4 visible-lg visible-md">

			<div class="col-lg-12 col-md-12 arabic" style="padding:0">
				<h3>الموقع</h3>
				<p><?php echo($unit->location); ?></p>
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
					<div class="type_left"><p><a class="left_link" href="<?= base_url().'project/ofok';?>">OFOK</a></p></div>
				</div>
			</div>
		</div>

		<div class="section col-lg-8 col-md-8">
			<?php if(!empty($images)):?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:5%; margin-left:0; margin-right:0; padding:0;">
					<ul class="bxslider">
					
					<?php foreach($images as $image): ?>
						<li><img src="<?= base_url(); ?>application/static/upload/units/<?php echo $image->image; ?>" style="min-height:450px;"/></li>
					<? endforeach ?>
					</ul>		
				</div>
			<?php endif?>

			<div class="col-lg-12 col-md-12" style="padding:0; margin-bottom:1%; text-align:right">
				<h3 class="arabic">تفاصيل الإعلان</h3>
				<table style="width:100%">
					<tr>
						<td class="light"><?php echo $unit_type[0]->type; ?></td> 
						<td class="right_col dark arabic">النوع</td>
					</tr>
					<tr>
						<td class="dark"><?php echo $unit->floor; ?></td>
						<td class="right_col light arabic">الطابق</td> 
					</tr>
					<tr>
						<td class="light"><?php echo $unit->rooms; ?></td>
						<td class="right_col dark arabic">الغرف</td> 
					</tr>
					<tr>
						<td class="dark"><?php echo $unit->bathrooms; ?></td>
						<td class="right_col light arabic">الحمامات</td> 
					</tr>
					<tr>
						<td class="light">
							<span style="float:right">&nbsp;<?php echo $unit->area; ?></span>
							<span>متر</span>
						</td>
						<td class="right_col dark arabic">المساحة</td> 
					</tr>
					<tr>
						<td class="dark"><?php echo $unit->finishing; ?></td>
						<td class="right_col light arabic">التشطيب</td> 
					</tr>
				</table>
			</div>

			<div class="col-lg-12 col-md-12 arabic" style="padding:0">
				<h3>عن الوحده</h3>
				<p><?php echo $unit->description; ?></p>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0">
				<?php if(sizeof($units) != 1):?>
				<h3 class="arabic">وحدات شبيهه</h3>
				<?php foreach($units as $u): 
					if($unit->id != $u->id):
						foreach($unit_images as $unit_image):
							if($unit_image[0] == $u->id):
								$featured_unit_image = $unit_image[1]; break;
							endif;
						endforeach?>
						<div class="image col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<img class="img-responsive" src="<?= base_url(); ?>application/static/upload/units/<?php echo $featured_unit_image ?>">
							<div class="type arabic"><p>للبيع</p></div>
							<div class="price col-lg-12">
								<p class="col-lg-12"><?php echo $unit_image[2]; ?></p>
								<p class="col-lg-12">
									<span class="arabic col-lg-1">متر&nbsp;</span>
									<span class="col-lg-8" style="padding:0"><?php echo $u->area; ?></span>
								</p>
								<p class="col-lg-12">
									<span class="arabic col-lg-1">غرف&nbsp;</span>
									<span class="col-lg-8" style="padding:0"><?php echo $u->rooms; ?></span>
								</p>
								<p class="col-lg-12">
									<span class="col-lg-1">.ج.م</span>
									<span class="col-lg-8" style="padding:0; color:#ed3f3f"><?php echo number_format($u->price); ?></span>
								</p>
								<button type="button" onclick="window.location.href='<?= base_url().'unit/' ?><?php echo $u->title; ?>'">التفاصيل</button>
							</div>
						</div>
				<?php endif;
				endforeach;
				else: ?>
				<?php endif ?>
				</div>

			</div>
		</div>

		<div class="col-sm-12 col-xs-12 visible-sm visible-xs arabic" style="padding:0">
			<h3>الخريطة</h3>
			<div id="map-canvas2"></div>
		</div>

		<footer>
			<div class="footer_text hidden-sm hidden-xs col-lg-12 col-md-12" style="padding-left:0; padding-right:0;">
				<div class="col-lg-1 col-md-1 text-center footer_links">
					<a class="frontend" href="">HOME</a>
				</div>
				<div class="col-lg-2 col-md-2 text-center footer_links">
					<a class="frontend" href="<?= base_url(); ?>contact">CONTACT US</a>
				</div>	
				<div class="col-lg-3 col-lg-offset-4 col-md-4 col-md-offset-3">
					<form action="" method="post" name="form">
						<div class="col-lg-8 col-md-8" style="padding:0; color:black">
							<input type="email" name="email" placeholder="YOUR EMAIL" class="subscribe_input rounded" style="text-align:left">
						</div>
						<div class="col-lg-2 col-md-2" style="padding:0;">
							<input type="submit" name="subscribe" value="SUBSCRIBE" class="subscribe_button">
						</div>
					</form>
				</div>		
				<div class="col-lg-2 col-md-2">
					<?php foreach($social_links as $social_link): ?>
						<a href="<?php echo $social_link->link; ?>">
							<img class="img-responsive col-lg-3 col-md-4" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/upload/social_links/<?php echo $social_link->image; ?>">
						</a>
					<?php endforeach ?>
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
					<?php foreach($social_links as $social_link): ?>
						<a href="<?php echo $social_link->link; ?>">
							<img class="img-responsive col-sm-4 col-xs-4" style="padding:5%; padding-top:2%;" src="<?= base_url(); ?>application/static/upload/social_links/<?php echo $social_link->image; ?>">
						</a>
					<?php endforeach ?>
				</div>	
			</div>
		</footer>

		<script src="<?= base_url(); ?>application/static/js/jquery.min.js"></script>
		<script src="<?= base_url(); ?>application/static/js/main.js"></script>
		<script src="<?= base_url(); ?>application/static/js/bootstrap.min.js"></script>
		<script src="<?= base_url(); ?>application/static/js/jquery.bxslider.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js"></script>

		<script>
			var map,map2,marker,marker2;
			
			function initialize() {
				var myLatlng = new google.maps.LatLng(<?php echo($project_lat);?>, <?php echo($project_long);?>);
			 	var mapOptions = {
			 		center: new google.maps.LatLng(<?php echo($project_lat);?>, <?php echo($project_long);?>),
			 		zoom: 8,
			 		mapTypeId: google.maps.MapTypeId.ROADMAP
			 	}

			 	map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    			map2 = new google.maps.Map(document.getElementById("map-canvas2"), mapOptions); 

			 	marker = new google.maps.Marker({
			        position: myLatlng, 
			        map: map,
			        title:"<?php echo($unit->title);?>"
			    });

			    marker2 = new google.maps.Marker({
			        position: myLatlng, 
			        map: map2,
			        title:"<?php echo($unit->title);?>"
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