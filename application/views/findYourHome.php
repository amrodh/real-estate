<!DOCTYPE html>

<html>
	<head>
		<title>Real Estate</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="<?= base_url(); ?>application/static/css/normalize.css"/>
		<link href="<?= base_url(); ?>application/static/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?= base_url(); ?>application/static/css/dataTables.bootstrap.css" rel="stylesheet"/>
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
						            <li class="col-lg-2 col-md-2 col-sm-2 col-xs-2 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 text-center"><a class="menu_link" href="<?= base_url(); ?>home">HOME</a></li>
						            <li class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center"><a class="menu_link" style="cursor:default;" href="">PROJECTS</a>
						            	<ul>
							            	<?php foreach($array as $project): ?>
												<li><a href="<?= base_url().'project/'.$project[0];?>"><?php echo $project[0]; ?></a></li>
											<?php endforeach ?>
										</ul>
						            </li>
									<li class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center"><a class="current_link" href="<?= base_url(); ?>findyourhome">FIND YOUR HOME</a><div class="current_link_arrow_findyourhome"></div></li>
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

		<div class="section col-lg-12 col-md-12">

			<div class="col-lg-3 col-md-3 visible-lg visible-md" style="padding:0; margin-bottom:5%;">
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

			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="padding:0;"><h3 style="text-align:right;">find your home</h3></div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" style="padding:0;">
				<form dir="rtl" id="search_form" action method="post" class="arabic col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<input id="search_form_button" style="text-align:center" type="submit" name="search" value="بحث" class="col-lg-1">
					<select class="col-lg-3" name="district">
						<option class="arabic" value="volvo">الموقع</option>
						<?php foreach($districts as $district): ?>
							<option class="arabic" value="<?php echo $district; ?>"><?php echo $district; ?></option>
						<?php endforeach ?>
					</select>
					<select class="col-lg-3" name="location">
						<option class="arabic" value="volvo">المحافظه</option>
						<?php foreach($cities as $city): ?>
							<option class="arabic" value="<?php echo $city; ?>"><?php echo $city; ?></option>
						<?php endforeach ?>
					</select>
					<div class="col-lg-3" style="margin-right:0"><span>ابحث هنا</span></div>
				</form>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php if(!empty($units_data)): ?>
						<div id="search_div">
							<h3 class="arabic">
								<span style="float:left">نتيجه بحث&nbsp;</span><?php echo $search_results ?>
							</h3>
						</div>
						<table id="search" class="table table-striped table-bordered" cellspacing="0" width="100%">
							<thead hidden>
					            <tr>
					                <th></th>
					                <th></th>
					                <th></th>
					                <th></th>
					            </tr>
					        </thead>
					 
					        <tfoot hidden>
					            <tr>
					                <th></th>
					                <th></th>
					                <th></th>
					                <th></th>
					            </tr>
					        </tfoot>
					        <tbody class="image">
					        	<?php while ($search_results > 0): ?>
					        		<tr>
									<?php $inner_count = 0;
									while (($inner_count < 4) && ($search_results > 0)): ?>
										<td class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
											<img class="img-responsive" src="<?= base_url(); ?>application/static/upload/units/<?php echo $units_data[$inner_count][6] ?>">
											<div class="type arabic"><p>للبيع</p></div>
											<div class="price col-lg-12">
												<p class="col-lg-12"><?php echo $units_data[$inner_count][7]; ?></p>
												<p class="col-lg-12">
													<span class="arabic col-lg-1">متر&nbsp;</span>
													<span class="col-lg-8"><?php echo $units_data[$inner_count][2]; ?></span>
												</p>
												<p class="col-lg-12">
													<span class="arabic col-lg-1">غرف&nbsp;</span>
													<span class="col-lg-8"><?php echo $units_data[$inner_count][5]; ?></span>
												</p>
												<p class="col-lg-12">
													<span class="arabic col-lg-1">.ج.م</span>
													<span class="col-lg-8" style="padding:0; color:#ed3f3f"><?php echo number_format($units_data[$inner_count][3]); ?></span>
												</p>
												<button type="button" onclick="window.location.href='<?= base_url().'unit/' ?><?php echo $units_data[$inner_count][1]; ?>'"><span>التفاصيل</span></button>
											</div>
										</td>
									<?php $inner_count++;
									$search_results = $search_results - 1;
									endwhile; ?>
										
									</tr>
					        	<?php $count = 0;
					        	while(!empty($units_data) && $count < 4) {
						        	array_shift($units_data);
						        	$count++;
						        }
					        	endwhile; 
					        else: 
							endif ?>
							</tbody>
					</table>
				</div>
			</div>
		</div>

		<footer>
			<div class="footer_text hidden-sm hidden-xs col-lg-12 col-md-12" style="padding-left:0; padding-right:0;">
				<div class="col-lg-1 col-md-1 text-center footer_links">
					<a class="frontend" href="<?= base_url(); ?>home">HOME</a>
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
		<script src="<?= base_url(); ?>application/static/js/jquery.dataTables.min.js"></script>
		<script src="<?= base_url(); ?>application/static/js/jquery.bxslider-rahisified.js"></script>
		<script src="<?= base_url(); ?>application/static/js/dataTables.bootstrap.js"></script>

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