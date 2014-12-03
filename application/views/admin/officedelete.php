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
              <h3 class="panel-title">Are you sure you want to delete this Office ? </h3>
            </div>

                 <div class="panel-footer">
                        <span>
                            <form action="" method="post">
                              <input type="hidden" name="id" value="<?= $office->id; ?>">
                              <input type="submit" name="confirmdelete"  class="button btn btn-sm " value="Confirm">
                              <input type="submit" name="cancel" class="button btn btn-sm " value="Cancel">
                            </form>
                        </span>
                    </div>
            
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