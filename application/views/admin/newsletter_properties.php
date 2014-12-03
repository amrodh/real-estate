<?php include('header.php'); ?>

<div id="wrapper">
<div id="page-wrapper">
<form action="" id="singleFormID" method="post" onsubmit="checkSingleNewsletterForm();return false;">
<div class="container-fluid htmlContent">
    <div class="col-lg-7 newsletter_container">
        <div class="col-lg-12">
            <div class="row" style="padding-left: 2%;">
                <div id="newsletter_logo">
                    <img class="newsletter_logo img-responsive" src="<?= base_url();?>/application/static/images/logo.png">
                </div>
                <div id="newsletter_title">
                    <?php 
                        if(isset($params))
                            echo $params['title'];
                    ?>
                </div>
            </div>
            <input type="hidden" id="url" value="<?php echo base_url();?>">
            <div id="newsletter_properties">
                <table>
                    <?php $count = 0; ?>
                    <tr>
                    <?php foreach ($properties as $property): ?>
                            <div class="propertyImages hide" id="img<?=$property->PropertyId; ?>">
                                <?= $images[$property->PropertyId]; ?>
                            </div>
                            <?php if ($count % 3 != 0): ?>
                                <td style="background-color: #f6f6f6; border: 1px solid #d4d4d4!important;padding: 1% 1%;">
                                    <!-- <div class="properties_number compare_number" style="width: 3%;height: 3%;font-size:100%;">
                                        <?php echo $count+1; ?>
                                    </div> -->
                                    <div class="compare_img">
                                        <input type="hidden" name="image_<?= $property->PropertyId;?>" value="">
                                        <img class="compare_images" style="max-height: 104px;" id="image_<?= $property->PropertyId;  ?>" src="<?= base_url();?>/application/static/images/sample_property_image.png"/>
                                    </div>
                                    <div class="compare_description" style="padding-left: 0;padding-right: 0;">
                                        <div class="compare_description_title">
                                            Description
                                            <!-- <?php echo $this->lang->line('compare_title1'); ?> -->
                                        </div>
                                        <input type="hidden" name="properties[]" value="<?= $property->PropertyId ;?>">
                                        <div class="compare_description_content">
                                            <?php if ($property->LocationProject != ''): ?>
                                                <?php echo $property->LocationProject; ?>, <?php echo $property->LocationDistrict; ?>, <?php echo $property->LocationCity; ?>
                                            <?php else: ?>
                                                <?php echo $property->LocationDistrict; ?>, <?php echo $property->LocationCity; ?>
                                            <?php endif ?>
                                            <br>
                                            Bedrooms: <?php echo $property->BedRoomsNumber;?> 
                                            <?php if ($property->BathRoomsNumber != 0): ?>
                                                , Bathrooms: <?php echo $property->BathRoomsNumber;?>
                                            <?php endif ?>
                                            <br>
                                            <?php if ($property->SalesTypeStr == 'Sale'): ?>
                                                <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle6'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $property->SaleCurrency.' '.number_format(explode('.',$property->SalePrice)[0]); ?></span>
                                            <?php else: ?>
                                                <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle7'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $property->RentCurrency.' '.number_format(explode('.',$property->RentPrice)[0]); ?></span>
                                            <?php endif ?>
                                            <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna -->
                                        </div>
                                    </div>
                                    <div class="compare_price">
                                        <div class="compare_price_text">
                                            <!-- EGP 2,000,000 -->
                                        </div>
                                    </div>
                                </td>
                            <?php else: ?>
                                </tr>
                                <tr>
                                    <td style="background-color: #f6f6f6; border: 1px solid #d4d4d4!important;padding: 1% 1%;">
                                        <div class="properties_number compare_number" style="width: 3%;height: 3%;font-size:100%;">
                                            <?php echo $count+1; ?>
                                        </div>
                                        <div class="compare_img">
                                            <input type="hidden" name="image_<?= $property->PropertyId;  ?>" value="">
                                            <img class="compare_images" style="max-height: 104px;" id="image_<?= $property->PropertyId;  ?>" src="<?= base_url();?>/application/static/images/sample_property_image.png"/>
                                        </div>
                                        <div class="compare_description" style="padding-left: 0;padding-right: 0;">
                                            <div class="compare_description_title">
                                                Description
                                                <!-- <?php echo $this->lang->line('compare_title1'); ?> -->
                                            </div>
                                            <input type="hidden" name="properties[]" value="<?= $property->PropertyId ;?>">
                                            <div class="compare_description_content">
                                                <?php if ($property->LocationProject != ''): ?>
                                                    <?php echo $property->LocationProject; ?>, <?php echo $property->LocationDistrict; ?>, <?php echo $property->LocationCity; ?>
                                                <?php else: ?>
                                                    <?php echo $property->LocationDistrict; ?>, <?php echo $property->LocationCity; ?>
                                                <?php endif ?>
                                                <br>
                                                Bedrooms: <?php echo $property->BedRoomsNumber;?> 
                                                <?php if ($property->BathRoomsNumber != 0): ?>
                                                    , Bathrooms: <?php echo $property->BathRoomsNumber;?>
                                                <?php endif ?>
                                                <br>
                                                <?php if ($property->SalesTypeStr == 'Sale'): ?>
                                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle6'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $property->SaleCurrency.' '.number_format(explode('.',$property->SalePrice)[0]); ?></span>
                                                <?php else: ?>
                                                    <b style="color: #5a7baa;"><?php echo $this->lang->line('propertydetails_subtitle7'); ?> </b> <span style="font-size: 120%;color: orange;"> <?php echo $property->RentCurrency.' '.number_format(explode('.',$property->RentPrice)[0]); ?></span>
                                                <?php endif ?>
                                                <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna -->
                                            </div>
                                        </div>
                                        <div class="compare_price">
                                            <div class="compare_price_text">
                                                <!-- EGP 2,000,000 -->
                                            </div>
                                        </div>
                                    </td>
                            <?php endif ?>
                            <?php $count++; ?>
                    <?php endforeach ?>
                </table>
            </div>
            <div id="newsletter_content">
                <?php 
                    if(isset($params))
                        echo $params['lower'];
                ?>
            </div>
            <div id="newsletter_contact">
                <a href="">
                    <img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_linkedin.png">
                </a>
                <a href="">
                    <img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_gmail.png">
                </a>
                <a href="">
                    <img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_fb.png">
                </a>
                <a href="">
                    <img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_twitter.png">
                </a>
                <div style="float:right;margin-top:-1%;">
                <img style="margin-top: -5px;" src="<?= base_url(); ?>application/static/images/icon_phone.png"/>
                   <div class="footer_col_title" style="margin-top: -29px;margin-left: 35px;font-size: 150%; color: #233f71;">
                       Contact Us<br>
                   </div>
                   <div style="margin-top: -10%;font-size: 200%;color: #233f71;margin-left: 20%;">
                   16223 
                   </div>
               </div>
            </div>
        </div>
    
    </div>
    <div class="col-lg-3" style="margin-top:5.5%;margin-left:1%;">
    
    <input type="hidden" name="title" value="<?= $params['title']; ?>">
    <input type="hidden" name="lower" value="<?= $params['lower']; ?>">
    <!-- <input type="hidden" name="images" value="<?= $images?>">
    <input type="hidden" name="properties" value="<?= $properties?>"> -->
    <!-- <input type="hidden" name="upper" value="<?= $params['upper']; ?>"> -->

    
        <table class="table" id="dev-table">
            <thead>
            <tr>
                <th><input type="checkbox" name="checkAll" id="checkall"> All</th>
                <th>Email</th>
            </tr>
            </thead>
            <tr>
                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Users" />
            </tr>
            <?php foreach($users as $user): ?>
                <tr>
                <td><input type="checkbox" class="singlecheck" name="singlecheck[]" value="<?= $user->user_identifier; ?>"></td>
                <td>
                    <?php if (is_object($user->user_identifier)): ?>
                        <a href="users/<?= $user->user_identifier->username; ?>">
                                <?= $user->user_identifier->username;  ?>
                        </a>
                    <?php else: ?>
                        <?= $user->user_identifier;  ?>
                    <?php endif ?>
                </td>
                
            </tr>          
            <?php endforeach ?>                       
        </table>
    </div>
    <div class="col-lg-1" style="margin-top:5.5%;">
        <input type="submit" name="confirmProperties" class="btn btn-primary" value="Send">
        
    </div>
</div>
</form>
</div>
</div>

<?php include('footer.php'); ?>
<script type="text/javascript">
    $(".propertyImages").each(function(){

                var image_src = $(this).find(".imagesList > li:nth-child(1) > img").attr('src');
                if(!image_src){
                    var id = $(this).attr('id');
                    var id = id.replace('img','');
                    $('#'+id).attr('disabled','disabled');
                    image_src = $("#url").val()+'/application/static/images/no_image.svg';
                }
                
                var id = $(this).attr('id');
                var id = id.replace('img','');

                $("#image_"+id).attr('src',image_src);
                $("[name='image_"+id+"']").val(image_src);
           });
</script>
