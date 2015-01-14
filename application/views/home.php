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
			                	<ul class="nav navbar-nav col-lg-12 col-md-12 col-sm-12 col-xs-12">
						            <li class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 text-center"><a class="current_link" href="">HOME</a><div class="current_link_arrow_home"></div></li>
						            <li class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center"><a class="menu_link" style="cursor:default;" href="">PROJECTS</a>
							            <ul>
							            	<?php foreach($array as $project): ?>
												<li><a href="<?= base_url().'project/'.$project[0];?>"><?php echo $project[0]; ?></a></li>
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

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:5%; margin-left:0.5%; margin-right:0; padding:0;">
			<ul class="bxslider">
				<?php foreach($slides as $slide): ?>
					<li><img src="<?= base_url(); ?>application/static/upload/slider/<?php echo $slide ?>" style="max-height:500px; margin:0 auto;"/></li>
				<?php endforeach ?>
			</ul> 
		</div>

		<div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 1%; margin-bottom: 4%;">
			<div>
				<img src="<?= base_url(); ?>application/static/images/real_estate/logo.png" alt="" class="col-lg-4 col-lg-offset-4 col-md-5 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-7 col-xs-offset-3">
			</div>
		</div>

		<div class="col-xs-12" style="margin-bottom:5%">
			<ul class="bxslider" data-options="{slideMargin:5,controls:true,moveSlides:1,pager:false}"
			 data-breaks="[{screen: 1200, slides:6}, {screen:700, slides:3}]">
				<?php $order = 1;
				foreach($featured_images as $featured_image): ?>
				<li>
					<a href="<?= base_url().'project/'.$featured_image[1];?>">
						<img class="" src="<?= base_url(); ?>application/static/upload/logos/<?php echo $featured_image[0];?>"/>
					</a>
				</li>
				<?php $order++;
				endforeach ?>
			</ul> 
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
		
		<script src="<?= base_url(); ?>application/static/js/jquery.bxslider-rahisified.js"></script>

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