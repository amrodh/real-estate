<?php include('header.php'); ?>

    <div id="wrapper">

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Users / New
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
				      <div class="row">
				        <div class="col-lg-12" >	   
				          	<div class="panel panel-info">
					            <div class="panel-heading">
					              	<h3 class="panel-title">User Creation</h3>
					            </div>
					            <div class="panel-body">
					              	<div class="row">
						            	<form action="" method="post" enctype="multipart/form-data">
						                	<input type="file" name="logo[]" required>
						                	<input type="submit" name="submit" class="btn btn-primary" value="Submit">
					                  	</form>
					              	</div>
					               
					            </div>
				            </div>
				            <?php if (isset($error)): ?>
					           	<div id="successAlert" class="alert alert-danger " role="alert">
					                <?= $error; ?> 
					           	</div>
					        <?php endif ?>
				        
				         
				       </div>
				     </div>
				   </div>
                 </div>
       

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>