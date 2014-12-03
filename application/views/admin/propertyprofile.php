<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Property / <?= $property->id; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="usersLandingContent">
                    
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3>Property / <?= $property->id; ?></h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                        <div class="col-lg-3">
                        <table>
                            <thead>
                                <tr>
                                    <td>Area : </td>
                                    <td><?= $property->area ?></td>
                                </tr>

                                <tr>
                                    <td>Type : </td>
                                    <td><?= $property->type ?></td>
                                </tr> 

                                <tr>
                                    <td>Price : </td>
                                    <td><?= $property->price ?></td>
                                </tr>

                                <tr>
                                    <td>District : </td>
                                    <td><?= $property->district ?></td>
                                </tr>

                                <tr>
                                    <td>Features : </td>
                                    <td><?= $property->features ?></td>
                                </tr>

                                <tr>
                                    <td>Address : </td>
                                    <td><?= $property->address ?></td>
                                </tr>  

                                <tr>
                                    <td>City : </td>
                                    <td><?= $property->city ?></td>
                                </tr>

                                <tr>
                                    <td>Date Created : </td>
                                    <td><?= $property->date_joined ?></td>
                                </tr>
                                
                            </thead>
                        </table>
                           
                        </div>
                       

                    </div>




                    <div class="row">
                         <div class="col-lg-12">
                            <ul class="bxslider" style="height: 155px!important;width:500px">
                             <?php foreach ($images as $image): ?>
                                 <li style="">
                                    <img class="slider_imgs" style="width:50%;height:50%" src="<?php echo base_url(); ?>application/static/upload/<?= $image->image_url; ?>"></a>
                                </li>
                             <?php endforeach ?>
                            </ul>
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