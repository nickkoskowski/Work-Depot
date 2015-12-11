<?php
/**
 * The template for header 16
 *
 *
 * @package WordPress
 * @subpackage mango
 * @since mango 1.0
 */
global $mango_settings, $mobile_menu, $search_button_class,$filter;
?>
<header id="header" class="header12 mango_header16" role="banner">
    <div id="header-top" class="custom clearfix">
        <div class="container-fluid">
            <div class="nav-left">
                <div class="header-row">
                    <?php get_template_part("inc/language"); ?>
                    <span class="nav-text hidden-sm hidden-xs"><i class="fa fa-phone"></i><span class="header-text"><span class="hidden-sm">Any question?</span> Call Us</span> <span>+987 123 654</span></span>
                </div><!-- End .header-row -->
            </div><!-- End .nav-left -->
            <div class="nav-right">
                <div class="header-row">
                    <?php mango_compare_wishlist_links() ?>
                    <?php mango_minicart(); ?>
                </div><!-- End .header-row -->
            </div><!-- End .nav-right -->
        </div><!-- End .container -->
    </div><!-- End #header-top -->
    <div id="header-inner">
        <div class="container-fluid">
            <div class="nav-logo nav-left">
                <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo("description"); ?>"><img src="<?php echo esc_url(mango_get_logo_url());?>" alt="<?php bloginfo("title") ?>"></a><span><?php echo get_bloginfo("description"); ?></span></h1>
            </div><!-- End .nav-logo -->
            <div class="nav-right">
                <div class="header-row">
                    <?php if($mango_settings['show-searchform']) { ?>
                        <div class="dropdown search-dropdown">

                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">

                            <i class="fa fa-search"></i>

                        </a>

                        <div class="dropdown-menu pull-right" role="menu">

                            <?php $search_button_class = " btn-custom2";

                            get_template_part("inc/mango_searchform");

                            ?>

                        </div><!-- end .dropdown-menu -->

                    </div><!-- End .search-dropdown -->
                    <?php } ?>
                    <?php if($mobile_menu){ ?>
                        <button type="button" id="mobile-menu-btn">
                            <span class="sr-only"><?php __("Toggle navigation",'mango') ?></span>
                            <i class="fa fa-navicon"></i>
                        </button>
                    <?php } ?>
                </div>
            </div>
            <div class="nav-right">
                   <?php  mango_get_header_box(16); ?>
               <?php if(has_nav_menu('main_menu')) {
                            wp_nav_menu (
                                array (
                                    'theme_location' => 'main_menu',
                                    'menu_id' => 'menu-main-navigation',
                                    'menu_class' => 'menu btt-dropdown',
                                    "depth" => 5,
                                    'container'       => 'nav',
                                    'container_class' => 'mango_nav_header_16',
                                    'walker' => new mango_top_navwalker
                                ) );
                    } ?>
            </div><!-- End .nav-right -->
        </div><!-- End .container-fluid -->
    </div><!-- End #header-inner -->
</header><!-- End #header -->