<?php include('header.php'); ?>

<div id="wrapper">
<div id="page-wrapper">

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
            <div class="row">
                <div id="newsletter_content" style="margin-top: 0;padding-left: 2%;">
                    <?php 
                        if(isset($params))
                            echo $params['upper'];
                    ?>
                </div>
            </div>
            <div id="newsletter_image">
                <img id="newsletter_mainImg" class="img-responsive" src="<?= base_url();?>/application/static/upload/temp/<?= $params['image'] ?>">
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
    <form action="" id="singleFormID" method="post" onsubmit="checkSingleNewsletterForm();return false;">
    <input type="hidden" name="title" value="<?= $params['title']; ?>">
    <input type="hidden" name="lower" value="<?= $params['lower']; ?>">
    <input type="hidden" name="upper" value="<?= $params['upper']; ?>">
    <input type="hidden" name="image" value="<?= $params['image']; ?>">
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
                <?php // printme($user->user_identifier);exit(); ?>
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
        <input type="submit" name="confirmsingle" class="btn btn-primary" value="Send">
        </form>
    </div>
</div>
</div>
</div>

<?php include('footer.php'); ?>
