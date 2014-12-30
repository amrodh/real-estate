<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Projects
                            </li>
                        </ol>
                    </div>
                </div>
        <div class="usersLandingContent">

        <div>Please note that all project images have to be of the same size.</div>
            
       
                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Projects" />
                         </div>
                        <table class="table" id="dev-table">
                            <thead>
                            <tr width="100%">
                                <th width="25%">Name</th>
                                <th width="25%">Location</th>
                                <th width="25%">Date Joined</th>
                            </tr>
                            </thead>
                            <?php if (is_array($projects)): ?>
                                <?php foreach($projects as $project): ?>
                                <tr>
                                    <td><a href="projects/<?php echo $project->id; ?>"><?php echo $project->name; ?></a></td>
                                    <td><?php echo $project->location; ?></td>
                                    <td><?php echo $project->creation_date; ?></td>
                                </tr>          
                            <?php endforeach ?>   
                            <?php else: ?>
                                <tr>
                                    <td colspan="4">
                                        <div class="alert alert-warning" role="alert">
                                            None Available
                                        </div>
                                    </td>
                                </tr>
                                
                            <?php endif ?>
                                                
                        </table>
                    </div>
                    <div class="col-lg-2">
                        <div class="panel panel-primary">
                             <a href="<?php echo base_url(); ?>admin/projects/new">
                                <div class="panel-footer">
                                    <span class="pull-left">Add New</span>
                                    <span class="pull-right"><i class="fa fa-user"></i></span>
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