<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Auction / New
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
              <h3 class="panel-title">Auction Creation</h3>
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
                        <td><input style="text-align:right;direction:RTL;" type="text" name="title_ar" value="<?php if(isset($params)) echo $params['title_ar']; ?>" required>
                        </td>
                        <td>العنوان</td>
                      </tr>
                      <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="text" id="" cols="30" rows="10"><?php if(isset($params)) echo $params['text']; ?></textarea>
                         </td>
                        <td>
                        <textarea style="text-align:right;direction:RTL;" name="text_ar" id="" cols="30" rows="10"><?php if(isset($params)) echo $params['text_ar']; ?></textarea>
                        </td>
                        <td>وصف</td>
                      </tr>
                       
                      <tr>
                        <td>Date / التاريخ</td>
                        <td><input type="date" name="date_held" value="<?php if(isset($params)) echo $params['date_held']; ?>" required>
                        </td>
                      </tr>

                      <tr>
                        <td>Image / الصورة</td>
                        <td><input type="file" name="userfile" required>
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