<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title"><?php echo $project->name; ?></h3>
                    </div>
                  <div class="col-lg-3" style="margin-top:2%;">
                    <img class="slider_imgs row" src="<?php echo base_url(); ?>application/static/upload/logos/<?= $project->logo; ?>">

                    <a href="<?= base_url(); ?>admin/changelogo/<?php echo $project->id ?>" class="row">
                      <div class="button btn btn-sm" style="color:white; width:45%; margin-top:10%;">
                          <span class="pull-left">Change logo</span>
                          <span class="pull-right"><i class="fa fa-image"></i></span>
                          <div class="clearfix"></div>
                      </div>
                    </a>
                  </div>
                  <div class="col-md-9 col-lg-9" style="margin-top:2%;"> 
                    <div style="font-size:200%;">Project information</div>
                      <table class="table table-user-information">
                        <tbody>
                          <tr>
                            <td width="15%">Description:</td>
                            <td width="85%"><span style="word-break:break-all"><?php echo $project->description; ?></span></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td width="%">location:</td>
                            <td width="%"><?php echo $project->location; ?></td>
                          </tr>  
                          <tr>
                            <td width="%">Latitude:</td>
                            <td width="%"><?php echo $project->latitude; ?></td>
                          </tr>
                          <tr>
                            <td width="%">Longitude:</td>
                            <td width="%"><?php echo $project->longitude; ?></td>
                          </tr>
                          <?php if ($project->is_featured == 1): ?>
                             <tr id="featured">
                              <td width="%">Featured:</td>
                              <td width="%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                            </tr>  
                          <?php endif ?>           
                        </tbody>
                      </table>
                  </div>
                  <div style="clear:both;"></div>
            
                  <span class="pull-right">
                        <form action="" method="post">
                           <input style="color:white" type="submit" name="edit"   class="button btn btn-sm " value="Edit"> 
                           <input style="color:white" type="submit" name="delete" class="button btn btn-sm " value="Delete">
                        </form>
                    </span>

            <div class="panel-body">
            

            <div style="font-size:200%;">Images</div>
            <div class="row sliderContent">
            <?php if (is_array($project->images)): ?>
               <ul class="bxslider" style="height: 200px!important;">
                  <?php foreach ($project->images as $image): ?>
                      <li class="image_<?= $image->id  ?>">
                          <img class="slider_imgs" src="<?php echo base_url(); ?>application/static/upload/projects/<?= $image->image; ?>">
                      </li>
                  <?php endforeach ?>
               </ul>
               <?php else: ?>
                  <div class="alert alert-warning" role="alert">None Available</div>
                <?php endif ?>
            </div>

            <div class="col-lg-12">
             
             <?php if (is_array($project->images)): ?>
              <table class="table" id="dev-table">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                  </thead>
                  
                  <tbody> 
                    <?php if (is_array($project->images)): ?>

                      <?php foreach ($project->images as $image): ?>
                        <tr class="image_<?= $image->id  ?>">
                          <td><?php echo $image->image; ?></td>
                          <td>
                            <a href="javascript:void(0);" onclick="projectImageDelete(<?= $image->id ?>)">
                              <span title="Delete" class="glyphicon glyphicon-remove"></span>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
              </table>
              <?php endif ?>

              <div class="panel panel-primary" style="width:20%">

                 <a href="<?= base_url(); ?>admin/addprojectimage/<?php echo $project->id ?>">
                    <div class="panel-footer">
                        <span class="pull-left">Add More Images</span>
                        <span class="pull-right"><i class="fa fa-image"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
              </div>
            </div> 

             <div class="panel-footer" style="height:51px;">
                    <!-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> -->
            
              </div>
            
          </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>