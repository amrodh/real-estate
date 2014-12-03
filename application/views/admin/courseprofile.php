<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
            <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $course->title; ?> <span style="float:right"><?= $course->title_ar ?></span></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                
                <div class=" col-md-9 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>
                          <!-- <img style="width:300px;" src="<?= base_url();?>application/static/upload/courses/<?= $course->image; ?>" alt=""> -->
                        </td>
                      </tr>
                      <!-- <tr>
                        <td width="%">Description:</td>
                        <td width="%"><?php echo $course->text; ?></td>
                        <td width="%" >
                          <span style="float:right;">
                            <?php echo $course->text_ar; ?>
                          </span>
                          </td>
                        <td></td>
                      </tr> -->
                      <tr>
                        <td width="%">Feature:</td>
                        <td id="img_td" width="%"><?php echo $course->feature; ?></td>
                        <td width="%" >
                          <span style="float:right;">
                            <?php echo $course->feature_ar; ?>
                          </span>
                          </td>
                        <td></td>
                      </tr>
                      
                      
                      
                     
                    </tbody>
                  </table>
                  
                 <!--  <a href="#" class="btn btn-primary">Email</a>
                  <a href="#" class="btn btn-primary">Message</a> -->
                </div>
              </div>
            </div>
             <div class="panel-footer" style="height:51px;">
                    <!-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> -->
                    <span class="pull-right">
                        <form action="" method="post">
                           <input style="color:white" type="submit" name="edit"   class="button btn btn-sm " value="Edit"> 
                           <input style="color:white" type="submit" name="delete" class="button btn btn-sm " value="Delete">
                        </form>
                    </span>
                </div>
            
          </div>
                <!-- Page Heading -->
               <!--  <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Course / <?= $course->title; ?>
                            </li>
                        </ol>
                    </div>
                </div> -->
               <!--  <div class="">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="<?= base_url();?>application/static/upload/courses/<?= $course->image; ?>" alt="">
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-12">
                         <h3><?= $course->title ?></h3>
                            <p><?= $course->feature;  ?></p>
                            <p><?= $course->text;  ?></p>
                    </div>
                    </div>

                      <div style="height:5px;width:100%;background-color:black"></div>

                     <div class="row" style="float:right">
                    <div class="col-lg-12">
                         <h3 style="float:right"><?= $course->title_ar ?></h3>
                            <p style="clear:both;" ><?= $course->feature_ar;  ?></p>
                            <p ><?= $course->text_ar;  ?></p>
                    </div>
                    </div>
                        
                 </div> -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>