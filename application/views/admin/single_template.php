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
    <tr>
        <?php 
            if(isset($params))
                echo $params['upper'];
        ?>
    </tr>
    <tr>
        <img id="newsletter_mainImg" style="width: 338%;" class="img-responsive" src="<?= base_url();?>/application/static/upload/temp/<?= $params['image'] ?>">
    </tr>
    <tr>
        <?php 
            if(isset($params))
                echo $params['lower'];
        ?>
    </tr>
    <tr>
      <td>
        <div id="newsletter_contact" style="background-color: #ebebeb;padding: 2%;width: 333%;">
                <a style="text-decoration: none;" href="www.linkedin.com"><img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_linkedin.png"></a>
                <a style="text-decoration: none;" href="www.google.com"><img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_gmail.png"></a>
                <a style="text-decoration: none;" href="www.facebook.com"><img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_fb.png"></a>
                <a style="text-decoration: none;" href="www.twitter.com"><img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_twitter.png"></a>
                <img style="margin-top: -5px;margin-left: 50%" src="<?= base_url(); ?>application/static/images/callcenter.png"/>        
        </div>
        
     </td>
    </tr>
</table>