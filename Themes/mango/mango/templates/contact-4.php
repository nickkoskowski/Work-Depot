<?php global $mango_settings, $post,$address, $contact_info,$contact_msg, $show_icons ;   ?>
<div class="row">
    <div class="col-sm-8">
        <?php the_content(); ?>
    </div><!-- End .col-sm-8 -->
    <div class="xs-margin visible-xs"></div><!-- space -->
    <div class="col-sm-4">
        <?php echo wpautop($contact_msg); ?> 
        <?php if($show_icons){
            mango_add_social_share();
        } ?>
    </div><!-- End .col-sm-4 -->
</div><!-- End .row -->
<div class="lg-margin visible-xs"></div><!-- space -->