<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Property Alert Users
                            </li>
                        </ol>
                    </div>
                </div>
        <div class="usersLandingContent">
            
       
                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Alerts" />
                         </div>
                        <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Date Joined</th>
                                <th>District</th>
                                <th>Type</th>
                                <th>Area</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <?php foreach($alerts as $alert): ?>
                            <tr>
                            <?php if (is_object($alert->user_identifier)): ?>
                                <td><a href="users/<?php echo $alert->user_identifier->username; ?>"><?php echo  $alert->user_identifier->username; ?></a></td>
                            <?php else: ?>
                                <td><a href="users/<?php echo $alert->user_identifier; ?>"><?php echo $alert->user_identifier ?></a></td>
                            <?php endif ?>
                                
                                <td><?= $alert->property_data['city']?></td>
                                <td><?= $alert->property_data['district']?></td>
                                <td><?= $alert->property_data['type']?></td>
                                <td>
                                    <?php if (isset($alert->property_data['area'])): ?>
                                        <?= $alert->property_data['area'] ?>
                                    <?php else: ?>
                                        --
                                    <?php endif ?>
                                </td>
                                <td>
                                    <?php if (isset($alert->property_data['price'])): ?>
                                        <?= $alert->property_data['price'] ?>
                                    <?php else: ?>
                                        --
                                    <?php endif ?>
                                </td>

                            </tr>          
                            <?php endforeach ?>                       
                        </table>
                    </div>
                   
                </div>
         </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>