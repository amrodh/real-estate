<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                 <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $project->name; ?></h3>
            </div>
            <div class="panel-body">
            

            <div class="row">
               <ul class="bxslider" style="height: 200px!important;">
               <?php if (is_array($project->images)): ?>
                  <?php foreach ($project->images as $image): ?>
                      <li>
                          <img class="slider_imgs" src="<?php echo base_url(); ?>application/static/upload/projects/<?= $image->image; ?>">
                      </li>
                  <?php endforeach ?>

            <?php endif ?>
          
               </ul>
            </div>

            <div class="col-lg-12">
           <!--  <?php printme($project->images) ?> -->
              <div style="font-size:200%;">Images</div>
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
                        <tr id="image_<?= $image->id  ?>">
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


              <div class="row">
                <div class=" col-md-9 col-lg-12 "> 
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
                      
                      
                      
                     
                    </tbody>
                  </table>
                  
               
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

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>