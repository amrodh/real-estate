<?php include('header.php'); ?>
    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Social Links
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="usersLandingContent">
            
       
                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel-body">
                            
                         </div>
                        <table class="table" id="dev-table">
                            <thead>
                            <tr width="100%">
                                <th width="25%">Image</th>
                                <th width="25%">Name</th>
                                <th width="25%">Link</th>
                                <th></th>
                            </tr>
                            </thead>
                            <?php if (is_array($social_links)): ?>
                                <?php foreach($social_links as $social_link): ?>
                                <tr id="social_<?= $social_link->id  ?>">
                                    <td><img class="row" src="<?php echo base_url(); ?>application/static/upload/social_links/<?= $social_link->image; ?>"></td>
                                    <td><?php echo $social_link->name; ?></td>
                                    <td><a href=""><?php echo $social_link->link; ?></a></td>
                                    <td>
                                        <a href="javascript:void(0);" onclick="socialLinkDelete(<?= $social_link->id ?>)">
                                            <span title="Delete" class="glyphicon glyphicon-remove"></span>
                                        </a>
                                    </td>
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
                             <a href="<?php echo base_url(); ?>admin/social/new">
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