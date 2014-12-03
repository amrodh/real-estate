<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                 <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $vacancy->name; ?> <span style="float:right"><?= $vacancy->name_ar ?></span></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                
                <div class=" col-md-9 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td width="25%">End Date:</td>
                        <td width="25%"><span style=""><?php echo $vacancy->end_date; ?></span></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td width="%">Description:</td>
                        <td width="%"><?php echo $vacancy->description; ?></td>
                        <td width="%" >
                          <span style="float:right;">
                            <?php echo $vacancy->description_ar; ?>
                          </span>
                          </td>
                        <td></td>
                      </tr>
                      
                      
                      
                     
                    </tbody>
                  </table>
                  
               
              </div>
            </div>
             <div class="panel-footer" style="height:51px;">
                    <!-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> -->
                    <span class="pull-right">
                        <form action="" method="post">
                           <input style="color:white" type="submit" name="edit"   class="button btn btn-sm " value="Edit"> 
                           <input style="color:white" type="submit" name="delete" class="button btn btn-sm " value="Delete">
                        </form>
                    </span>
                </div>
            
          </div>


                 <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Enrolled Users" />
                         </div>
                        
                            <?php if (is_array($users)): ?>
                                <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Lasr Name</th>
                                <th>Application Date</th>
                                <th>Résumé</th>
                            </tr>
                            </thead>
                                 <?php foreach($users as $user): ?>
                                <tr>
                                <td>
                                    <?php if (is_object($user->user_identifier)): ?>
                                        <a href="<?= base_url();?>admin/users/<?= $user->user_identifier->username  ?>">
                                            <?= $user->user_identifier->username;  ?>
                                        </a>
                                    <?php else: ?>
                                         <?= $user->user_identifier;  ?>
                                    <?php endif ?>
                                </td>
                                <td><?= $user->first_name  ?></td>
                                <td><?= $user->last_name  ?></td>
                                
                                <td><?= $user->date_joined  ?></td>
                                <td><a href="download/<?= $user->cv; ?>" target="_blank">
                                    <span class="glyphicon glyphicon-arrow-down"></span>
                                </a></td>
                               
                                </tr>          
                                <?php endforeach ?> 
                                <?php else: ?>
                                <div class="alert alert-warning">
                                    No Enrolled Users Yet..
                                </div>  
                            <?php endif ?>
                                               
                        </table>
                    </div>
                   
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>