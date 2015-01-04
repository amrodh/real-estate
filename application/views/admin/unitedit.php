<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Unit / Edit
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
              <h3 class="panel-title">Unit Edit</h3>
            </div>
            <div class="panel-body">
              <div class="row">
              <form action="" id="unitEditForm"  method="post">
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><input type="text" name="title" id="unitName" data-change='0' data-default='<?= $unit->title; ?>' required pattern=".{4,}" title="4 characters minimum" 
                        value="<?php if(isset($params)) echo $params->title; ?>">

                        </td>
                      </tr>
                      <tr>
                        <td>Area:</td>
                        <td><input type="text" name="area" required pattern=".{4,}" value="<?php if(isset($params)) echo $params->area; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Price:</td>
                        <td><input type="text" name="price" required pattern=".{4,}" value="<?php if(isset($params)) echo $params->price; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Floor:</td>
                        <td><input type="text" name="floor" required pattern="" value="<?php if(isset($params)) echo $params->floor; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Rooms:</td>
                        <td><input type="text" name="rooms" required pattern="" value="<?php if(isset($params)) echo $params->rooms; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Bathrooms:</td>
                        <td><input type="text" name="bathrooms" required pattern="" value="<?php if(isset($params)) echo $params->bathrooms; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Location:</td>
                        <td><input type="text" name="location" required pattern=".{4,}" value="<?php if(isset($params)) echo $params->location; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Finishing:</td>
                        <td><input type="text" name="finishing" required pattern=".{4,}" value="<?php if(isset($params)) echo $params->finishing; ?>">
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
                  
                  <input type="button" name="confirmedit" class="btn btn-primary" onclick="checkUnitName()" value="Submit">
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