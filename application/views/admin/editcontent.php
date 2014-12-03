<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
              

                <div class="row">
                    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-12" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Slide Editing</h3>
            </div>
            <div class="panel-body">
              <div class="row">
              <form action="" method="post" enctype="multipart/form-data">
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Heading 1:</td>
                        <td><input type="text" name="h1_en" required pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['h1_en']; ?>">
                        </td>
                        <td><input style="text-align:right;direction:RTL;" type="text" name="h1_ar" value="<?php if(isset($params)) echo $params['h1_ar']; ?>" required>
                        </td>
                        <td>العنوان 1</td>
                      </tr>
                      <tr>
                        <td>Heading 2</td>
                        <td>
                           <input type="text" name="h2_en" required pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['h2_en']; ?>">
                         </td>
                        <td>
                        <input type="text" style="text-align:right;direction:RTL;" name="h2_ar" required pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['h2_ar']; ?>">
                        </td>
                        <td>العنوان 2</td>
                      </tr>
                      <tr>
                        <td>Link</td>
                        <td>
                           <input type="text" name="link_en" required pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['link_en']; ?>">
                         </td>
                        <td>
                        <input type="text" style="text-align:right;direction:RTL;" name="link_ar" required pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['link_ar']; ?>">
                        </td>
                        <td>الرابط</td>
                      </tr>
                     

                      <tr>
                        <td>Image / الصورة
                        <?php if (isset($old_params)): ?>
                           <img style="width:40%;" 
                          src="<?php echo base_url(); ?>application/static/upload/slider/<?= $old_params['image']; ?>">
                        <?php else: ?>
                           <img style="width:40%;" 
                          src="<?php echo base_url(); ?>application/static/upload/slider/<?= $params['image']; ?>">
                        <?php endif ?>
                        </td>
                        <td><input type="file" name="userfile['image']">
                        </td>
                      </tr>
                       <tr>
                        <td>Logo
                        <?php if (isset($old_params)): ?>
                           <img style="width:40%;margin-left:25%;" 
                          src="<?php echo base_url(); ?>application/static/upload/slider/<?= $old_params['logo']; ?>">
                        <?php else: ?>
                           <img style="width:40%;margin-left:25%;" 
                          src="<?php echo base_url(); ?>application/static/upload/slider/<?= $params['logo']; ?>">
                        <?php endif ?></td>
                        <td><input type="file" name="userfile['logo']">
                        </td>

                        
                        <td>
                        <input type="file" name="userfile['alt_logo']">
                        </td>
                        <td>
                         <?php if (isset($old_params)): ?>
                           <img style="width:40%;" 
                          src="<?php echo base_url(); ?>application/static/upload/slider/<?= $old_params['alt_logo']; ?>">
                        <?php else: ?>
                           <img style="width:40%;" 
                          src="<?php echo base_url(); ?>application/static/upload/slider/<?= $params['alt_logo']; ?>">
                        <?php endif ?></td>
                        لوجو

                        </td>
                      </tr>
                      
                     
                    </tbody>
                  </table>
                  
                  <input type="hidden" name="id" value="<?= $params['id'] ?>">
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                  <input type="submit" name="cancel" class="btn btn-primary" value="Cancel">

                  </form>
                </div>
               
              </div>
            </div>
            <?php if (isset($error)): ?>
              <div class="alert alert-danger " role="alert">
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