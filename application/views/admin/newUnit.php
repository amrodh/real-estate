<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Unit / New
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
              <h3 class="panel-title">Unit Creation</h3>
            </div>
            <div class="panel-body">
              <div class="row">
              <form action="" method="post" enctype="multipart/form-data">
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Title:</td>
                        <td><input type="text" name="title" required pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['title']; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Area:</td>
                        <td><input type="text" name="area" value="<?php if(isset($params)) echo $params['area']; ?>" required>
                        </td>
                      </tr>
                      <tr>
                        <td>Price</td>
                        <td><input type="number" name="price" value="<?php if(isset($params)) echo $params['price']; ?>" required></td>
                      </tr>
                      <tr>
                        <td>Description</td>
                        <td>
                          <textarea name="description" cols="30" rows="10" required><?php if(isset($params)) echo $params['description'];?></textarea>
                        </td>
                      </tr>
                       
                      <tr>
                        <td>Project</td>
                        <td>
                          <select name="project_id" id="" required>
                            <?php foreach ($projects as $project): ?>
                              <option value="<?= $project->id; ?>"><?= $project->name; ?></option>
                            <?php endforeach ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>Location</td>
                        <td><input type="text" name="location" value="<?php if(isset($params)) echo $params['location']; ?>"required >
                        </td>
                      </tr>
                      <tr>
                        <td>Latitude</td>
                        <td><input type="text" name="latitude" value="<?php if(isset($params)) echo $params['latitude']; ?>"required >
                        </td>
                      </tr>
                      <tr>
                        <td>Longitude</td>
                        <td><input type="text" name="longitude" value="<?php if(isset($params)) echo $params['longitude']; ?>"required >
                        </td>
                      </tr>
                      <tr>
                        <td>Featured</td>
                        <td>
                          <input type="checkbox" name="is_featured">
                        </td>
                      </tr>

                      <tr>
                        <td>Type</td>
                        <td>
                          <select name="type_id" id="" required>
                            <?php foreach ($types as $type): ?>
                              <option value="<?= $type->id ?>"><?= $type->type; ?></option>
                            <?php endforeach ?>
                          </select>
                        </td>
                      </tr>

                      <tr>
                        <td>Finishing</td>
                        <td><input type="text" name="finishing" value="<?php if(isset($params)) echo $params['finishing']; ?>"required >
                        </td>
                      </tr>
                      <tr>
                        <td>Images</td>
                        <td>
                          <input type="file" name="userfile[]" multiple>
                        </td>
                      </tr>
                      
                     
                    </tbody>
                  </table>
                  </form>
                  
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
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