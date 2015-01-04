<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                 <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $unit->title; ?></h3>
            </div>
            <div class="panel-body">
            
              <div class="row">
                
                <div class=" col-md-9 col-lg-12 "> 
                  <div style="font-size:200%;">Unit information</div>
                  <table class="table table-user-information">
                    <tbody>
                    <tr>
                        <td width="15%">Project:</td>
                        <td width="85%">
                          <a href="<?= base_url(); ?>admin/projects/<?= $unit->project->id ?>"><?= $unit->project->name ?></a>
                        </td>
                        <td></td>
                      </tr>
                      <tr>
                        <td width="15%">Description:</td>
                        <td width="85%"><span style="word-break:break-all"><?php echo $unit->description; ?></span></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td width="%">Location:</td>
                        <td width="%"><?php echo $unit->location; ?></td>
                      </tr>
                      <tr>
                        <td width="%">Area:</td>
                        <td width="%"><?php echo $unit->area; ?></td>
                      </tr>
                      <tr>
                        <td width="%">Price:</td>
                        <td width="%"><?php echo $unit->price; ?></td>
                      </tr>
                      <tr>
                        <td width="%">Floor:</td>
                        <td width="%"><?php echo $unit->floor; ?></td>
                      </tr>
                      <tr>
                        <td width="%">Rooms:</td>
                        <td width="%"><?php echo $unit->rooms; ?></td>
                      </tr>
                      <tr>
                        <td width="%">Bathrooms:</td>
                        <td width="%"><?php echo $unit->bathrooms; ?></td>
                      </tr>
                      <tr>
                        <td>Finishing</td>
                        <td width="%"><?php echo $unit->finishing; ?></td>
                      </tr>
                      <?php if ($unit->is_featured == 1): ?>
                         <tr id="featured">
                          <td width="%">Featured:</td>
                          <td width="%"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></td>
                        </tr>  
                      <?php endif ?>
                        
                    </tbody>
                  </table>       
              </div>
            </div>
            <span class="pull-right">
                <form action="" method="post">
                   <input style="color:white" type="submit" name="edit"   class="button btn btn-sm " value="Edit"> 
                   <input style="color:white" type="submit" name="delete" class="button btn btn-sm " value="Delete">
                </form>
            </span>
            <div style="font-size:200%;">Images</div>
              <div class="row sliderContent">
                <?php if (is_array($unit->images)): ?>
                   <ul class="bxslider" style="height: 200px!important;">
                      <?php foreach ($unit->images as $image): ?>
                          <li class="image_<?= $image->id  ?>">
                              <img class="slider_imgs" src="<?php echo base_url(); ?>application/static/upload/units/<?= $image->image; ?>">
                          </li>
                      <?php endforeach ?>
                   </ul>
                   <?php else: ?>
                      <div class="alert alert-warning" role="alert">None Available</div>
                    <?php endif ?>
                </div>


            <div class="col-lg-12">
              
              <?php if (is_array($unit->images)): ?>
              <table class="table" id="dev-table">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th></th>
                    </tr>
                  </thead>
                  
                  <tbody> 
                    <?php if (is_array($unit->images)): ?>

                      <?php foreach ($unit->images as $image): ?>
                        <tr id="image_<?= $image->id  ?>">
                          <td><?php echo $image->image; ?></td>
                          <td>
                            <a href="javascript:void(0);" onclick="unitImageDelete(<?= $image->id ?>)">
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
                 
                 <a href="<?= base_url(); ?>admin/addunitimage/<?php echo $unit->id ?>">
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