<?php
if ( !defined ( 'ABSPATH' ) )
    die( '-1' );
define( 'MANGO_WIDGETS_PATH', dirname ( __FILE__ ) . '/widgets/' );

class MangoWidgetsClass {
    function __construct () {
        add_action ( 'init', array ( $this, 'initPlugin' ) );
		$this->loadWidgets ();
    }
    function initPlugin () {
    }

    // Load widgets
    function loadWidgets () {
        $widgets_array_1 = array (
            "ad_banner",
             "contact",
            "mango_testimonials-widget",
            "mango_clients-widget",
            "information_widget",
            "mango_recent_post",
            "mango_video_widget",			"mango_widget_social",			"mango_subscribe_widget"

        );
        foreach ( $widgets_array_1 as $widget ) {
            require_once ( MANGO_WIDGETS_PATH . $widget . '.php' );
        }

        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
            $widgets_array = array (
                "mango_product_banner",
                "mango_woocommerce_cat",
                "woocommerce_product_widget",
                "mango_related_product",
				 "ad_banner_wc",				  "mango_widget_statistic"
            );

            foreach ( $widgets_array as $widget ) {
                require_once ( MANGO_WIDGETS_PATH . $widget . '.php' );
            }
        }
    }
}

new MangoWidgetsClass();
?>