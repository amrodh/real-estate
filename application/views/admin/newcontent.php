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
              <h3 class="panel-title">Slide Creation</h3>
            </div>
            <div class="panel-body">
              <div class="row">
              <form action="" method="post" enctype="multipart/form-data">
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <!-- <tr>
                        <td>Heading 1:</td>
                        <td><input type="text" name="h1_en" pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['h1_en']; ?>">
                        </td>
                        <td><input style="text-align:right;direction:RTL;" type="text" name="h1_ar" value="<?php if(isset($params)) echo $params['h1_ar']; ?>" >
                        </td>
                        <td>العنوان 1</td>
                      </tr>
                      <tr>
                        <td>Heading 2</td>
                        <td>
                           <input type="text" name="h2_en" pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['h2_en']; ?>">
                         </td>
                        <td>
                        <input type="text" style="text-align:right;direction:RTL;" name="h2_ar" pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['h2_ar']; ?>">
                        </td>
                        <td>العنوان 2</td>
                      </tr> -->
                      <!-- <tr>
                        <td>Link</td>
                        <td>
                           <input type="text" name="link_en" pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['link_en']; ?>">
                         </td>
                        <td>
                        <input type="text" style="text-align:right;direction:RTL;" name="link_ar" pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['link_ar']; ?>">
                        </td>
                        <td>الرابط</td>
                      </tr> -->
                     

                      <tr>
                        <td>Image / الصورة</td>
                        <td><input type="file" name="userfile['image']" required>
                        </td>
                      </tr>
                       <!-- <tr>
                        <td>Logo</td>
                        <td><input type="file" name="userfile['logo']" >
                        </td>

                        
                        <td><input type="file" name="userfile['alt_logo']" >
                        </td>
                        <td>لوجو</td>
                      </tr> -->
                      
                     
                    </tbody>
                  </table>
                  </form>
                  
                  <input type="submit" name="submit" class="btn btn-primary" value="Submit">
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