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
						            <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-1 text-center"><a class="menu_link" href="<?= base_url(); ?>home">HOME</a></li>
						            <li class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center"><a class="menu_link" href="">PROJECTS</a>
						            	<ul>
							            	<?php foreach($array as $project): ?>
												<li><a href="<?= base_url().'project/'.$project[0];?>"><?php echo $project[0]; //echo $project[1]; ?></a></li>
											<?php endforeach ?>
										</ul>
						            </li>
						            <?php foreach($array as $project): 
							        		if($project[0] == "sahrawy"):?>
												<li class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">
													<a class="menu_link" href="<?= base_url().$project[1].'/'.$project[0];?>"><?php echo $project[0]; ?></a>
												</li>
									<?php endif;
									 endforeach ?>
						            <?php foreach($array as $project): 
							        		if($project[0] == "rayos"):?>
												<li class="col-lg-2 col-md-2 col-sm-2 col-xs-12 text-center">
													<a class="current_link" href="<?= base_url().$project[1].'/'.$project[0];?>"><?php echo $project[0]; ?></a>
												</li>
									<?php endif;
									 endforeach ?>
						            <li class="col-lg-2 col-md-2 col-sm-2 hidden-xs text-center"><a class="menu_link" href="<?= base_url(); ?>contact">CONTACT US</a></li>
						            <li class="col-xs-12 visible-xs text-center"><a class="menu_link" href="<?= base_url(); ?>contact">CONTACT US</a></li>
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

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h3 style="text-align:right"><?php echo $id->name; ?></h3></div>

		<div class="section col-lg-3 col-md-3 visible-lg visible-md">

			<div class="col-lg-12 col-md-12 arabic" style="padding:0">
				<h3>الموقع</h3>
				<p>اعتداء وبريطانيا جوي أن. مع هنا شدّت الموسوعة جُل, فاتّبع أوروبا الأرواح أضف عل. كل مشارف وفرنسا يتم</p>
			</div>

			<div class="col-lg-12 col-md-12 arabic" style="padding:0">
				<h3>الخريطة</h3>
				<div id="map-canvas"></div>
			</div>

			<div class="col-lg-12 col-md-12 arabic" style="padding:0">
				<h3>مشاريع أخرى</h3>
				<img style="padding:0; margin-top: 5%;" class="img-responsive col-lg-12 col-md-12" src="<?= base_url(); ?>application/static/images/real_estate/project1.jpg">
				<div class="image_left col-lg-12 col-md-12" style="padding:0;">
					<img style="padding:0; margin-top: 5%;" class="img-responsive col-lg-12 col-md-12" src="<?= base_url(); ?>application/static/images/real_estate/project2.jpg">
					<div class="type_left"><p>اسم المشروع</p></div>
				</div>
				<img style="padding:0; margin-top: 5%;" class="img-responsive col-lg-12 col-md-12" src="<?= base_url(); ?>application/static/images/real_estate/project3.jpg">
			</div>
		</div>

		<div class="section col-lg-9 col-md-9 visible-lg visible-md">
			<img style="padding:0" class="img-responsive col-lg-12 col-md-12" src="<?= base_url(); ?>application/static/images/real_estate/sahrawy.jpg">

			<div class="col-lg-12 col-md-12 arabic" style="padding:0">
				<h3>عن المشروع </h3>
				<p>بعض ما سقوط جديدة. الا ما وحتّى المبرمة الأوروبية, لم أحدث وبدأت بمحاولة كان. هذه ان وأزيز الغربي, وقامت وحلفاؤها كلّ هو. الشمال التّحول الإكتفاء بال و, وأزيز اليابانية و ضرب.</p>
				<p>أفاق بلديهما شموليةً بـ عدم, جوزيف للأسطول 30 كما. استبدال بولندا، ان وفي. قبل بيرل الحكومة أن, عل كردة عليها الإتحاد وصل. 30 بحق أسيا الأمور وقوعها،, عل نقطة النفط كلا. بال إختار المشترك نورماندي عل, هذه لم سحقت بوزيرها, </p>
			</div>

			<div class="col-lg-12 col-md-12 arabic" style="padding:0">
				<h3>الوحدات</h3>
				<div class="sets col-lg-12 col-md-12">
					<div class="image col-lg-3 col-md-3">
						<img class="img-responsive" src="<?= base_url(); ?>application/static/images/real_estate/ap4.jpg">
						<div class="type"><p>للبيع</p></div>
						<div class="price">
							<p>شقه</p>
							<p>
								<span>180</span>
								<span>متر</span>
								<span>&nbsp;&nbsp;&nbsp;3</span>
								<span>غرف</span>
							</p>
							<p>
								<span style="color:red">235000</span>
								<span>جنيه</span>
							</p>
							<button type="button" onclick="window.location.href='<?= base_url(); ?><?php echo $id->id; ?>/unit'">التفاصيل</button>
						</div>
					</div>
					<div class="image col-lg-3 col-md-3">
						<img class="img-responsive" src="<?= base_url(); ?>application/static/images/real_estate/ap3.jpg">
						<div class="type"><p>للاجار</p></div>
						<div class="price">
							<p>شقه</p>
							<p>
								<span>180</span>
								<span>متر</span>
								<span>&nbsp;&nbsp;&nbsp;3</span>
								<span>غرف</span>
							</p>
							<p>
								<span style="color:red">2000/</span>
								<span>شهر</span>
							</p>
							<button type="button" onclick="window.location.href='<?= base_url(); ?><?php echo $id->id; ?>/unit'">التفاصيل</button>
						</div>
					</div>
					<div class="image col-lg-3 col-md-3">
						<img class="img-responsive" src="<?= base_url(); ?>application/static/images/real_estate/ap2.jpg">
						<div class="type"><p>للبيع</p></div>
						<div class="price">
							<p>شقه</p>
							<p>
								<span>180</span>
								<span>متر</span>
								<span>&nbsp;&nbsp;&nbsp;3</span>
								<span>غرف</span>
							</p>
							<p>
								<span style="color:red">235000</span>
								<span>جنيه</span>
							</p>
							<button type="button" onclick="window.location.href='<?= base_url(); ?><?php echo $id->id; ?>/unit'">التفاصيل</button>
						</div>
					</div>
					<div class="image col-lg-3 col-md-3">
						<img class="img-responsive" src="<?= base_url(); ?>application/static/images/real_estate/ap1.jpg">
						<div class="type"><p>للبيع</p></div>
						<div class="price">
							<p>شقه</p>
							<p>
								<span>180</span>
								<span>متر</span>
								<span>&nbsp;&nbsp;&nbsp;3</span>
								<span>غرف</span>
							</p>
							<p>
								<span style="color:red">235000</span>
								<span>جنيه</span>
							</p>
							<button type="button" onclick="window.location.href='<?= base_url(); ?><?php echo $id->id; ?>/unit'">التفاصيل</button>
						</div>
					</div>

				</div>


				<div class="sets col-lg-12 col-md-12 arabic">
					<div class="image col-lg-3 col-md-3">
						<img class="img-responsive" src="<?= base_url(); ?>application/static/images/real_estate/ap4.jpg">
						<div class="type"><p>للبيع</p></div>
						<div class="price">
							<p>شقه</p>
							<p>
								<span>180</span>
								<span>متر</span>
								<span>&nbsp;&nbsp;&nbsp;3</span>
								<span>غرف</span>
							</p>
							<p>
								<span style="color:red">235000</span>
								<span>جنيه</span>
							</p>
							<button type="button" onclick="window.location.href='<?= base_url(); ?><?php echo $id->id; ?>/unit'">التفاصيل</button>
						</div>
					</div>
					<div class="image col-lg-3 col-md-3">
						<img class="img-responsive" src="<?= base_url(); ?>application/static/images/real_estate/ap3.jpg">
						<div class="type"><p>للاجار</p></div>
						<div class="price">
							<p>شقه</p>
							<p>
								<span>180</span>
								<span>متر</span>
								<span>&nbsp;&nbsp;&nbsp;3</span>
								<span>غرف</span>
							</p>
							<p>
								<span style="color:red">2000/</span>
								<span>شهر</span>
							</p>
							<button type="button" onclick="window.location.href='<?= base_url(); ?><?php echo $id->id; ?>/unit'">التفاصيل</button>
						</div>
					</div>
					<div class="image col-lg-3 col-md-3">
						<img class="img-responsive" src="<?= base_url(); ?>application/static/images/real_estate/ap2.jpg">
						<div class="type"><p>للبيع</p></div>
						<div class="price">
							<p>شقه</p>
							<p>
								<span>180</span>
								<span>متر</span>
								<span>&nbsp;&nbsp;&nbsp;3</span>
								<span>غرف</span>
							</p>
							<p>
								<span style="color:red">235000</span>
								<span>جنيه</span>
							</p>
							<button type="button" onclick="window.location.href='<?= base_url(); ?><?php echo $id->id; ?>/unit'">التفاصيل</button>
						</div>
					</div>
					<div class="image col-lg-3 col-md-3">
						<img class="img-responsive" src="<?= base_url(); ?>application/static/images/real_estate/ap1.jpg">
						<div class="type"><p>للبيع</p></div>
						<div class="price">
							<p>شقه</p>
							<p>
								<span>180</span>
								<span>متر</span>
								<span>&nbsp;&nbsp;&nbsp;3</span>
								<span>غرف</span>
							</p>
							<p>
								<span style="color:red">235000</span>
								<span>جنيه</span>
							</p>
							<button type="button" onclick="window.location.href='<?= base_url(); ?><?php echo $id->id; ?>/unit'">التفاصيل</button>
						</div>
					</div>

				</div>
			</div>
		</div>



		<footer>
			<div class="footer_text hidden-sm hidden-xs col-lg-12 col-md-12" style="padding-left:0; padding-right:0;">
				<div class="col-lg-1 col-md-1 text-center footer_links">
					<a class="frontend" href="<?= base_url(); ?>home">HOME</a>
				</div>
				<div class="col-lg-1 col-md-1 text-center footer_links">
					<a class="frontend" href="<?= base_url(); ?>contact">CONTACT US</a>
				</div>	
				<div class="col-lg-3 col-lg-offset-3 col-md-3 col-md-offset-3">
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
			 	var mapCanvas = document.getElementById('map-canvas');
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