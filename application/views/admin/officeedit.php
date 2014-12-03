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
              <h3 class="panel-title">Office Creation</h3>
            </div>
            <div class="panel-body">
              <div class="row">
              <form action="" method="post" enctype="multipart/form-data">
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>District:</td>
                        <td><input type="text" name="district_en" required pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['district_en']; ?>">
                        </td>
                        <td><input style="text-align:right;direction:RTL;" type="text" name="district_ar" value="<?php if(isset($params)) echo $params['district_ar']; ?>" required>
                        </td>
                        <td>منطقة</td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td>
                            <textarea name="address_en" id="" cols="30" rows="10" required><?php if(isset($params)) echo $params['address_en'];?></textarea>
                         </td>
                        <td>
                        <textarea style="text-align:right;direction:RTL;" name="address_ar" id="" cols="30" rows="10"required><?php if(isset($params)) echo $params['address_ar']; ?></textarea>
                        </td>
                        <td>العنوان</td>
                      </tr>


                      <tr>
                       <td>Latitude</td>
                       <td>
                         <input type="text" name="latitude" value="<?php if(isset($params)) echo $params['latitude']; ?>" required>
                       </td><td></td><td></td>
                      </tr>
                      <tr>
                       <td>Longitude</td>
                       <td>
                         <input type="text" name="longitude" value="<?php if(isset($params)) echo $params['longitude']; ?>" required>
                       </td><td></td><td></td>
                      </tr>

                      <tr>
                       <td>Phone</td>
                       <td>
                         <input type="text" name="phone" value="<?php if(isset($params)) echo $params['phone']; ?>" required>
                       </td><td></td><td></td>
                      </tr>

                      <tr>
                       <td>Working Hours</td>
                       <td>
                        <label for="">from: </label>
                        <select name="start_time" id="">
                          <?php 
                            $range = range(1,23);
                            foreach ($range as $i) {

                              if(isset($params)){
                                  if($i == $params['start_time'])
                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                  else
                                    echo '<option value="'.$i.'">'.$i.'</option>';


                              }else{
                                if($i != 8)
                                  echo '<option value="'.$i.'">'.$i.'</option>';
                                else
                                  echo '<option value="'.$i.'" selected>'.$i.'</option>';
                              }
                              

                            }
                           ?>
                        </select>
                        <label for=""> to: </label>
                         <select name="end_time" id="">
                          <?php 
                            $range = range(1,23);
                            foreach ($range as $i) {

                               if(isset($params)){
                                  if($i == $params['end_time'])
                                    echo '<option value="'.$i.'" selected>'.$i.'</option>';
                                  else
                                    echo '<option value="'.$i.'">'.$i.'</option>';


                              }else{
                                if($i != 17)
                                  echo '<option value="'.$i.'">'.$i.'</option>';
                                else
                                  echo '<option value="'.$i.'" selected>'.$i.'</option>';
                              }

                             
                            }
                           ?>
                        </select>
                       </td><td></td><td></td>
                      </tr>
                       

                     
                     
                    </tbody>
                  </table>
                  </form>
                  
                  <input type="submit" name="confirmedit" class="btn btn-primary" value="Submit">
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