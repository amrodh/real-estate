<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> User / <?php echo $user->username; ?> 
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-12" >
          

          <ul class="nav nav-tabs" role="tablist">

            <li class="active"><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
            <li><a href="#properties" role="tab" data-toggle="tab">Properties</a></li>
            <li><a href="#favorites" role="tab" data-toggle="tab">Favorites</a></li>
            <li><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>

          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="profile">
              <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $user->first_name.' '.$user->last_name; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Username:</td>
                        <td><?php echo $user->username; ?></td>
                      </tr>
                      <tr>
                        <td width="20%">First Name:</td>
                        <td width="80%"><?php echo $user->first_name; ?></td>
                      </tr>
                      <tr>
                        <td width="20%">Last Name:</td>
                        <td width="80%"><?php echo $user->last_name; ?></td>
                      </tr>
                      <tr>
                        <td width="20%">Email:</td>
                        <td width="80%"><?php echo $user->email; ?></td>
                      </tr>
                      <tr>
                        <td>Date joined:</td>
                        <td><?php echo $user->date_joined; ?></td>
                      </tr>
                      <tr>
                        <td>Phone Number</td>
                        <td><?php echo $user->phone; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Location</td>
                        <td><?php echo $user->location; ?>
                        </td>
                      </tr>
                      
                     
                    </tbody>
                  </table>
                  
                 <!--  <a href="#" class="btn btn-primary">Email</a>
                  <a href="#" class="btn btn-primary">Message</a> -->
                </div>
              </div>
            </div>
             <div class="panel-footer" style="height:51px;">
                    <!-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> -->
                    <span class="pull-right">
                        <form action="" method="post">
                          <input type="hidden" name="username" value="<?php echo $user->username; ?>">
                           <input style="color:white" type="submit" name="edit"   class="button btn btn-sm " value="Edit"> 
                           <input style="color:white" type="submit" name="delete" class="button btn btn-sm " value="Delete">
                        </form>
                    </span>
                </div>
            
          </div>
            </div>

            

          <div class="tab-pane" id="properties">
            <?php if (is_array($properties)): ?>
                 <div class="col-lg-10">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Properties" />
                         </div>
                        <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <th>City</th>
                                <th>Area</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>District</th>
                                <th>Address</th>
                                <th>Date Joined</th>
                            </tr>
                            </thead>
                            <?php foreach($properties as $property): ?>
                            <?php if ($property->is_valid == 1): ?>
                                <tr class="list-group-item-success">
                            <?php else: ?>
                                <tr class="list-group-item-warning">
                            <?php endif ?>
                                <td><?php echo $property->city; ?></td>
                                <td><?php echo $property->area; ?></td>
                                <td><?php echo $property->type; ?></td>
                                <td><?php echo $property->price; ?></td>
                                <td><?php echo $property->district; ?></td>
                                <td><?php echo $property->address; ?></td>
                                <td><?php echo $property->date_joined; ?></td>
                            </tr>          
                            <?php endforeach ?>                       
                        </table>
                    </div>
            <?php else: ?>
              <div id="successAlert" class="alert alert-warning " role="alert">
                        No Properties found..
              </div>
            <?php endif ?>
          </div>


          <div class="tab-pane" id="favorites">
            <?php if (is_array($favorites)): ?>
                 <div class="col-lg-10">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Properties" />
                         </div>
                        <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <th>City</th>
                                <th>Area</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>District</th>
                                <th>Address</th>
                                <th>Date Joined</th>
                            </tr>
                            </thead>
                            <?php foreach($favorites as $favorite): ?>
                            <tr class="list-group-item-success">
                                <td><?php echo $favorite->property->city; ?></td>
                                <td><?php echo $favorite->property->area; ?></td>
                                <td><?php echo $favorite->property->type; ?></td>
                                <td><?php echo $favorite->property->price; ?></td>
                                <td><?php echo $favorite->property->district; ?></td>
                                <td><?php echo $favorite->property->address; ?></td>
                                <td><?php echo $favorite->property->date_joined; ?></td>
                            </tr>          
                            <?php endforeach ?>                       
                        </table>
                    </div>
            <?php else: ?>
              <div id="successAlert" class="alert alert-warning " role="alert">
                        No Favorites found..
              </div>
            <?php endif ?>
          </div>
           



            



            <div class="tab-pane" id="settings">
              <div class="row">
                <div class="col-lg-12 changePasswordDiv">
                  <div class="row changePasswordContainer">
                    <div class="col-lg-12">
                      <div id="successAlert" class="alert alert-success hide" role="alert">
                        Password changed successfully
                      </div>
                      <form action="" id="passwordChangeForm" onsubmit="completeChangePassword();return false;">
                      <input type="hidden" id="userID" value="<?= $user->id; ?>">
                      <input type="hidden" id="url" value="<?= base_url(); ?>">
                        <table>
                          <tr><td>
                           <div class="input-group">
                            <span class="input-group-addon">*</span>
                            <input type="text" id="changePassword_current" class="form-control" placeholder="Current Password" required>
                          </div>
                          </td></tr>
                          <tr><td>
                           <div class="input-group">
                            <span class="input-group-addon">*</span>
                            <input type="text" id="changePassword_new_1" class="form-control" placeholder="New Password" required>
                          </div>
                          </td></tr>
                          <tr><td>
                           <div class="input-group">
                            <span class="input-group-addon">*</span>
                            <input type="text" id="changePassword_new_2" class="form-control" placeholder="Confirm Password" required>
                          </div>
                          </td></tr>
                          <tr><td>
                           <div class="input-group">
                            <div class="col-lg-4">
                              <input type="submit" name="confirm"   class="button btn btn-sm btn-warning" value="Confirm">
                            </div>
                            <div class="col-lg-4 col-lg-offset-2">
                              <button class="changePasswordCancel button btn btn-sm btn-danger">
                                Cancel 
                              </button>
                            </div>
                          </div>
                          </td></tr>
                        </table>
                      </form>
                    </div>
                  </div>
                  <a href="javascript:void(0);"  class="changePasswordAnchor" data-toggle="tooltip" >
                      <!-- <ul>
                        <li>Change Password</li>
                      </ul> -->
                  </a>
                </div>
              </div>
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