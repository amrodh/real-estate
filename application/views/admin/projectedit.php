<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Project / Edit
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
              <h3 class="panel-title">Project Edit</h3>
            </div>
            <div class="panel-body">
              <div class="row">
              <form action="" method="post" id="projectEditForm" enctype="multipart/form-data">
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" id="projectName" data-change='0' data-default='<?= $project->name; ?>' required pattern=".{4,}" title="4 characters minimum" 
                        value="<?php if(isset($params)) echo $params->name; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Location</td>
                        <td>
                            <input type="text" name="location" required pattern=".{4,}" title="4 characters minimum" 
                        value="<?php if(isset($params)) echo $params->location; ?>">
                         </td>
                      </tr>
                      <tr>
                        <td>Latitude:</td>
                        <td><input type="text" name="latitude" required pattern=".{4,}" value="<?php if(isset($params)) echo $params->latitude; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Longitude:</td>
                        <td><input type="text" name="longitude" required pattern=".{4,}" value="<?php if(isset($params)) echo $params->longitude; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="description" id="" cols="30" rows="10"><?php if(isset($params)) echo $params->description; ?></textarea>
                         </td>
                      </tr>
                      <tr>
                        <td>Featured</td>
                        <td>
                          <input type="checkbox" name="is_featured" <?php if(($params->is_featured) == 1) echo 'checked' ?> >
                        </td>
                      </tr>  
                      
                    </tbody>
                  </table>
                  </form>
                  
                  <input type="button" name="confirmedit" class="btn btn-primary" onclick="checkProjectName()" value="Submit">
                  <input type="hidden" name="confirmedit_hidden">
                  <input type="submit" name="cancel" class="btn btn-primary" value="Cancel">
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
       

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>