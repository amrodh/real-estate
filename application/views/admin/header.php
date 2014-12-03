<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin System</title>

 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap-theme.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/style.css">

<!-- <?php if ($request == 'content'): ?> -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/style.css"> -->
<!-- <?php endif ?> -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/admin.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/datepicker.css">
<link href="<?= base_url();?>/application/static/css/jquery.bxslider.css" rel="stylesheet" />

 <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,500,700" rel="stylesheet" type="text/css">

 
 <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery.min.js"></script>
 <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap.min.js"></script>
 
 <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.structure.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.theme.min.css">
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/filter.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-select.js"></script>
    
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>application/static/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/static/css/bootstrap-select.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>application/static/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>application/static/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" style="" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">
                   <u>
                       Real Estate Back-End
                   </u>
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                     <?php 
                     $first_name = $this->session->userdata['first_name'];
                     $last_name = $this->session->userdata['last_name'];
                     echo $first_name.' '.$last_name;
                    ?>
                     </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>admin/logout"> 
                    <i class="fa fa-sign-out"></i> 
                     Log Out
                    </a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if($request == 'dashboard') echo 'class="active"'; ?> >
                        <a href="<?php echo base_url(); ?>admin/"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li <?php if($request == 'content') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url(); ?>admin/content"><i class="glyphicon glyphicon-list-alt"></i> Content Management</a>
                    </li>
                    <li <?php if($request == 'projects') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url(); ?>admin/projects"><i class="fa fa-fw fa-user"></i> Projects</a>
                    </li>
                    <li <?php if($request == 'properties') echo 'class="active"'; ?> >
                        <a href="<?php echo base_url(); ?>admin/units"><i class="fa fa-fw fa-circle"></i> Units</a>
                    </li>
                    <li <?php if($request == 'users') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-fw fa-user"></i> Users</a>
                    </li>
                    <li <?php if($request == 'offices') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url(); ?>admin/offices"><i class="glyphicon glyphicon-pushpin"></i> Offices</a>
                    </li>
                    <!-- <li <?php if($request == 'courses') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url(); ?>admin/courses"><i class="glyphicon glyphicon-th-large"></i> Courses</a>
                    </li> -->
                     <li <?php if($request == 'vacancies') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url(); ?>admin/vacancies"><i class="glyphicon glyphicon-briefcase"></i> Vacancies</a>
                    </li>
                    <li <?php if($request == 'propertyalert') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url(); ?>admin/propertyalert"><i class="glyphicon glyphicon-phone-alt"></i> Property Alert</a>
                    </li>
                     <li <?php if($request == 'newsletter') echo 'class="active"'; ?> >
                        <a href="<?php echo base_url(); ?>admin/newsletter"><i class="fa fa-fw fa-envelope"></i> Newsletter</a>
                    </li>
                    <!-- <li <?php if($request == 'auctions') echo 'class="active"'; ?>>
                        <a href="<?php echo base_url(); ?>admin/auctions"><i class="glyphicon glyphicon-tower"></i> Auctions</a>
                    </li> -->
                   
                    
                     
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>