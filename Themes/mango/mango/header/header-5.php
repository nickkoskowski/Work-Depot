<?php
/**
 * The template for header 5
 *
 *
 * @package WordPress
 * @subpackage mango
 * @since mango 1.0
 */
global $mango_settings, $mobile_menu, $search_button_class,$filter;
?>
<header id="header" class="header5 mango_header5" role="banner">
    <div class="container">
        <div id="header-top" class="clearfix">
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
        </div><!-- End #header-top -->
        <div class="nav-logo text-center">
            <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_bloginfo("description"); ?>"><img src="<?php echo esc_url(mango_get_logo_url());?>" alt="<?php bloginfo("title") ?>"></a><span><?php echo get_bloginfo("description"); ?></span></h1>
        </div><!-- End .nav-logo -->
        <?php if(has_nav_menu('main_menu')) { ?>
            <div id="menu-container" class="sticky-menu text-center">
                <div class="row">
                    <div class="container">
                        <?php
                        wp_nav_menu (
                            array (
                                'theme_location' => 'main_menu',
                                'menu_id' => 'menu-main-navigation',
                                'menu_class' => 'menu',
                                "depth" => 5,
                                'container'       => 'nav',
                                'walker' => new mango_top_navwalker
                            ) );
                        ?>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .menu-cotainer -->
        <?php } ?>
    </div><!-- End .container -->
</header><!-- End #header -->