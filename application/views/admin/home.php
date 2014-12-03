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
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/admin.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/datepicker.css">
 
 <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery.min.js"></script>
 <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap.min.js"></script>
 <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,500,700" rel="stylesheet" type="text/css">
 
 <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery-ui.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.structure.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/js/jquery-ui.theme.min.css">
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/admin.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/filter.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-select.js"></script>
    <link href="<?php echo base_url(); ?>application/static/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/static/css/bootstrap-select.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/static/css/plugins/morris.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>application/static/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body style="background-color:white">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-4 loginDiv">
                    <!-- <img src="application/static/images/logo.png" width="200" alt=""> -->
                    <form role="form" action="<?php echo base_url(); ?>admin/authenticate" method="post">
                      <?php if ($error == 0): ?>
                        <div class="form-group">
                          <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                      <?php else: ?>
                        <div class="form-group has-error">
                          <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group has-error">
                          <input type="password" class="form-control" name="password">
                        </div>
                        <div class="alert alert-danger" role="alert">
                          <p>Please enter the correct username and password for a staff account. Note that both fields may be case-sensitive.</p>
                        </div>
                      <?php endif ?>
                        <input type="submit" class="btn btn-default" style="background-color:white;">
                    </form>
                </div>
            </div>
        </div>  
</body>




</html>