<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Properties
                            </li>
                        </ol>
                    </div>
                </div>
        <div class="usersLandingContent">
            
       
                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Properties" />
                         </div>
                        <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <th>Owner</th>
                                <th>Area</th>
                                <th>Type</th>
                                <th>Price</th>
                                <th>District</th>
                                <th>City</th>
                                <th>Date Joined</th>
                            </tr>
                            </thead>
                            <?php if (is_array($properties)): ?>
                                <?php foreach($properties as $property): ?>
                            <?php if ($property->is_valid == 1): ?>
                                <tr class="list-group-item-success">
                            <?php else: ?>
                                <tr class="list-group-item-warning">
                            <?php endif ?>
                                <td><a href="users/<?= $property->user->username;  ?>"><?= $property->user->username;  ?></a></td>
                                <td><?php echo $property->area; ?></td>
                                <td><?php echo $property->type; ?></td>
                                <td><?php echo $property->price; ?></td>
                                <td><?php echo $property->district; ?></td>
                                <td><?php echo $property->city; ?></td>
                                <td><?php echo $property->date_joined; ?></td>
                                 <td><a href="properties/<?= $property->id; ?>" target="_blank">
                                    <span class="glyphicon glyphicon-arrow-right"></span>
                                </a></td>
                            </tr>          
                            <?php endforeach ?>  
                            <?php endif ?>
                                                 
                        </table>
                    </div>
                   <!--  <div class="col-lg-2">
                        <div class="panel panel-primary">
                             <a href="<?php echo base_url(); ?>admin/properties/new">
                                <div class="panel-footer">
                                    <span class="pull-left">Add New</span>
                                    <span class="pull-right"><i class="fa fa-user"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                </div>
         </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>