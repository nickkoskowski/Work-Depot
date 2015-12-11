<?php
/**
 * The template for header 8
 *
 *
 * @package WordPress
 * @subpackage mango
 * @since mango 1.0
 */
global $mango_settings, $mobile_menu, $search_button_class,$filter;
?>
<header id="header" class="header8 mango_header8" role="banner">
    <div id="header-top" class="custom clearfix">
        <div class="container">
            <div class="nav-left">
                <div class="header-row">
                    <?php get_template_part("inc/language"); ?>
                    <?php mango_phone_info() ?>
                </div><!-- End .header-row -->
            </div><!-- End .nav-left -->
            <div class="nav-right">
                <div class="header-row">
                    <?php mango_compare_wishlist_links() ?>
                    <?php mango_minicart(); ?>
                    <?php if($mobile_menu){ ?>
                       <button type="button" id="mobile-menu-btn">
                            <span class="sr-only"><?php __("Toggle navigation",'mango') ?></span>
                            <i class="fa fa-navicon"></i>
                        </button>
                    <?php } ?>
                </div><!-- End .header-row -->
            </div><!-- End .nav-right -->
        </div><!-- End .container -->
    </div><!-- End #header-top -->
    <div class="container">
        <div class="nav-logo nav-left">
            <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo("description"); ?>"><img src="<?php echo esc_url(mango_get_logo_url());?>" alt="<?php bloginfo("title") ?>"></a><span><?php echo get_bloginfo("description"); ?></span></h1>
        </div><!-- End .nav-logo -->
        <div class="nav-right">
          <?php mango_get_header_box(8); ?>
        </div><!-- End .nav-right -->
    </div><!-- End .container -->
    <?php if(has_nav_menu('main_menu')) { ?>
    <div id="menu-container" class="sticky-menu">
        <div class="container">
            <?php
            wp_nav_menu (
                array (
                    'theme_location' => 'main_menu',
                    'menu_id' => 'menu-main-navigation',
                    'menu_class' => 'menu rtl-dropdownn',
                    "depth" => 5,
                    'container'       => 'nav',
                    'container_class' => 'pull-left',
                    'walker' => new mango_top_navwalker
                ) 
			);
            ?>
            <?php if($mango_settings['show-searchform']) { ?>
                <div class="header-search-container pull-right">
                    <?php get_search_form(); ?>
                </div>
            <?php  } ?>
        </div><!-- End .container -->
    </div><!-- End .menu-cotainer -->
    <?php } ?>
</header><!-- End #header -->