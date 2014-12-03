<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Vacancy / New
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
              <h3 class="panel-title">Vacancy Creation</h3>
            </div>
            <div class="panel-body">
              <div class="row">
              <form action="" method="post" enctype="multipart/form-data">
                
                
                <div class=" col-md-12 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" required pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['name']; ?>">
                        </td>
                        <!-- <td><input style="text-align:right;direction:RTL;" type="text" name="name_ar" value="<?php if(isset($params)) echo $params['name_ar']; ?>" required>
                        </td>
                        <td>الأسم</td> -->
                      </tr>
                      <tr>
                        <td>Description</td>
                        <td>
                            <textarea name="description" id="editor1" cols="30" rows="10"><?php if(isset($params)) echo $params['description']; ?></textarea>
                         </td>
                        <!-- <td>
                        <textarea style="text-align:right;direction:RTL;" name="description_ar" id="" cols="30" rows="10"><?php if(isset($params)) echo $params['description_ar']; ?></textarea>
                        </td>
                        <td>وصف</td> -->
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

<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
</script>