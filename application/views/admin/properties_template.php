<table style="width:95%; border: 10px solid #233f71;">
    <tr>
        <td style="width: 30%">
            <img class="newsletter_logo img-responsive" style="width: 100%;" src="<?= base_url();?>/application/static/images/logo.png">
        </td>
        <td style="font-size: 190%;padding: 4%;">
            <?php 
                if(isset($params))
                    echo $params['title'];
            ?>
        </td>
    </tr>
    <?php $count = 0; ?>
    <tr>
    <?php foreach ($properties as $property): ?>
           <!--  <div class="propertyImages hide" style="display:none;" id="img<?=$property->PropertyId; ?>">
                <?= $images[$property->PropertyId]; ?>
            </div> -->
            <?php if ($count % 3 != 0): ?>
                <td style="background-color: #f6f6f6; width:30%; border: 1px solid #d4d4d4!important;padding: 1% 1%;">
                   <!--  <div class="properties_number compare_number" style="width: 3%;height: 3%;font-size:100%;background-color: white;color: orange;position: absolute;font-size: 17px;margin-top: -124px;text-align: center;margin-left: 23px;">
                        <?php echo $count+1; ?>
                    </div> -->
                    <div class="compare_img">

                        <img class="compare_images" style="max-height: 104px;" id="image_<?= $property->PropertyId;  ?>" src="<?php echo $params['image_'.$property->PropertyId]; ?>"/>
                    </div>
                    <div class="compare_description" style="padding-left: 0;padding-right: 0;">
                        <div class="compare_description_title">
                            Description
                            <!-- <?php echo $this->lang->line('compare_title1'); ?> -->
                        </div>
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
                    <td style="background-color: #f6f6f6; width:30%; border: 1px solid #d4d4d4!important;padding: 1% 1%;">
                        <div class="properties_number compare_number" style="width: 3%;height: 3%;font-size:100%;background-color: white;color: orange;position: absolute;font-size: 17px;margin-top: -124px;text-align: center;margin-left: 23px;">
                            <?php echo $count+1; ?>
                        </div>
                        <div class="compare_img">
                            <a href="<?php base_url();?>propertyDetails/<?= $property->PropertyId;?>"><img class="compare_images" style="max-height: 104px;" id="image_<?= $property->PropertyId;  ?>" src="<?php echo $params['image_'.$property->PropertyId]; ?>"/></a>
                        </div>
                        <div class="compare_description" style="padding-left: 0;padding-right: 0;">
                            <div class="compare_description_title">
                                Description
                                <!-- <?php echo $this->lang->line('compare_title1'); ?> -->
                            </div>
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
    <tr>
        <?php 
            if(isset($params))
                echo $params['lower'];
        ?>
    </tr>
    <tr>
      <td>
        <div id="newsletter_contact" style="background-color: #ebebeb;padding: 2%;width: 300%;">
                <a style="text-decoration: none;" href="www.linkedin.com"><img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_linkedin.png"></a>
                <a style="text-decoration: none;" href="www.google.com"><img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_gmail.png"></a>
                <a style="text-decoration: none;" href="www.facebook.com"><img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_fb.png"></a>
                <a style="text-decoration: none;" href="www.twitter.com"><img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_twitter.png"></a>
                <img style="margin-top: -5px;margin-left: 54%" src="<?= base_url(); ?>application/static/images/callcenter.png"/>        
        </div>
        
     </td>
    </tr>
</table>
