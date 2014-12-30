<?php include('header.php'); ?>
    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Home Slider
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="usersLandingContent">
                    
                    <div class="row">
                        <div class="col-lg-12 hidden-sm hidden-xs ">
    <ul class="bxslider" style="height: 455px!important;">
         <?php if (is_array($slides)): ?>
            <?php foreach ($slides as $slide): ?>
                <li>

              <a href="<?= $slide->link_en; ?>">
                <img class="slider_imgs" src="<?php echo base_url(); ?>application/static/upload/slider/<?= $slide->image; ?>">
              </a>
              <!-- <div class="slider_logo">
                  <img src="<?php echo base_url(); ?>application/static/upload/slider/<?= $slide->logo; ?>">
              </div>
              <div class="slider_components">
                  <p><?= $slide->h1_en; ?></p>
                  <p><?= $slide->h2_en; ?></p>
              </div> -->
          </li>
            <?php endforeach ?>

         <?php endif ?>
          
      </ul>
</div>
   


                   

                    </div>
                 </div>

            <div class="row">
                 
    <div class="col-lg-12">
         <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <!-- <th>Order</th>
                                <th>heading 1</th>
                                <th>heading 1_ar</th>
                                <th>heading 2</th>
                                <th>heading 2_ar</th> -->
                                <th>Image</th>
                                <th></th>
                            </tr>
                            </thead>
                            <?php if (is_array($slides)): ?>
                                <?php foreach ($slides as $slide): ?>
                                    
                               
                                <tr>
                                    <!-- <td><?= $slide->order  ?></td>
                                    <td><?= $slide->h1_en  ?></td>
                                    <td><?= $slide->h1_ar  ?></td>
                                    <td><?= $slide->h2_en  ?></td>
                                    <td><?= $slide->h2_ar  ?></td> -->
                                    <td><?= $slide->image  ?></td>
                                    <!-- <td><a href="editcontent/<?= $slide->id;?>">
                                        <span title="Edit" class="glyphicon glyphicon-edit"></span>
                                    </a></td> -->
                                    <td><a href="deletecontent/<?= $slide->id;?>">
                                        <span title="Delete" class="glyphicon glyphicon-remove"></span>
                                    </a></td>
                                </tr>
                                <?php endforeach ?>
                            <?php else: ?>
                                <div class="alert alert-warning">
                                    No Slides Found..
                                </div>
                            <?php endif ?>
                        </table>
        <div class="panel panel-primary" style="width:10%">
                             <a href="<?php echo base_url(); ?>admin/content/new">
                                <div class="panel-footer">
                                    <span class="pull-left">Add New</span>
                                    <span class="pull-right"><i class="fa fa-user"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
        </div>
    </div>
            </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>