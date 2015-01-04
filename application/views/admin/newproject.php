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
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" required pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['name']; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Description:</td>
                        <td>
                        <textarea name="description" cols="25" rows="10" required><?php if(isset($params)) echo $params['description'];?></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td>Location</td>
                        <td><input type="text" name="location" value="<?php if(isset($params)) echo $params['location']; ?>" required></td>
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
                        <td>Logo</td>
                        <td>
                          <input type="file" name="logo" required>
                        </td>
                      </tr>
                     <tr>
                      <td>Images</td>
                      <td>
                        <input type="file" name="userfile[]" required multiple>
                      </td>
                    </tr>
                    <tr>
                        <td>Featured</td>
                        <td>
                          <input type="checkbox" name="is_featured">
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