<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Newsletter
                            </li>
                        </ol>
                    </div>
                </div>
        <div class="usersLandingContent">
            
       
                <div class="row">
                    <div class="col-lg-9">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Users" />
                         </div>
                        <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Date Joined</th>
                                <th></th>
                            </tr>
                            </thead>
                            <?php foreach($users as $user): ?>
                           	<tr id="email_<?= $user->id  ?>">
                                <td>
                                	<?php if (is_object($user->user_identifier)): ?>
                                		<a href="users/<?= $user->user_identifier->username; ?>">
                                				<?= $user->user_identifier->username;  ?>
                                		</a>
                                	<?php else: ?>
                                		<?= $user->user_identifier;  ?>
                                	<?php endif ?>
                                </td>
                                <td><?php echo $user->date_joined; ?></td>
                                
                                <td>
                                    <a href="javascript:void(0);" onclick="newslettermailDelete(<?= $user->id ?>)">
                                        <span title="Delete" class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>
                            </tr>         
                            <?php endforeach ?>  

                        </table>
                    </div>
                    <div class="col-lg-3">
                        <div class="panel panel-primary">
                             <a href="<?php echo base_url(); ?>admin/newsletter/create">
                                <div class="panel-footer">
                                    <span class="pull-left">Create Newsletter</span>
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