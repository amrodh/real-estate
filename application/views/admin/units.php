<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Units
                            </li>
                        </ol>
                    </div>
                </div>
        <div class="usersLandingContent">
            
       <div>Please note that all unit images have to be of the same size.</div>


                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Vacancies" />
                         </div>
                        <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Project</th>
                                <th>Price</th>
                                <th>Location</th>
                            </tr>
                            </thead>
                            <?php if (is_array($units)): ?>
                                <?php foreach($units as $unit): ?>
                                <tr>
                                    <td><a href="units/<?php echo $unit->id; ?>"><?= $unit->title ?></a></td>
                                    <td><?= $unit->project_id ?></td>
                                    <td><?= $unit->price ?></td>
                                    <td><?= $unit->location ?></td>
                                </tr>          
                            <?php endforeach ?>     
                            <?php else: ?>
                            <div class="alert alert-warning">
                                No Units Found..
                            </div>   
                            <?php endif ?>
                                              
                        </table>
                    </div>
                     <div class="col-lg-2">
                        <div class="panel panel-primary">
                             <a href="<?php echo base_url(); ?>admin/units/new">
                                <div class="panel-footer">
                                    <span class="pull-left">Add New</span>
                                    <span class="pull-right"><i class="fa fa-building"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
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