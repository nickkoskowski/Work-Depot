<?php
if (!defined('ABSPATH')) die('-1');
if (class_exists('Vc_Manager')) {
    $recent_work_style = array();
    class VCExtendAddonClass
    {
        public $version_ = '';
        function __construct()
        {
            // We safely integrate with VC with this hook
            add_action('init', array($this, 'integrateWithVC'));   
            add_shortcode('mango_category', array($this, 'mango_category'));
            add_shortcode('mango_banner', array($this, 'mango_banner'));
            add_shortcode('mango_blog', array($this, 'mango_blog'));
            add_shortcode('latest_posts', array($this, 'latest_posts'));
            add_shortcode('mango_shipping', array($this, 'mango_shipping'));
            add_shortcode('mango_clients', array($this, 'mango_clients'));
            add_shortcode('mango_testimonials', array($this, 'mango_testimonials'));
            add_shortcode('mango_category_fix', array($this, 'mango_category_fix'));
            add_shortcode('mango_category_side', array($this, 'mango_category_side'));
            add_shortcode('mango_banner_long', array($this, 'mango_banner_long'));
            add_shortcode('mango_promated_categories', array($this, 'mango_promated_categories'));
            add_shortcode('mango_categories_list', array($this, 'mango_categories_list'));
            add_shortcode('mango_discount_box', array($this, 'mango_discount_box'));
            add_shortcode('mango_banner_vine', array($this, 'mango_banner_vine'));
            add_shortcode('mango_category_box', array($this, 'mango_category_box'));
            add_shortcode('mango_vertical_categories', array($this, 'mango_vertical_categories'));
            add_shortcode('mango_vertical_banner', array($this, 'mango_vertical_banner'));
            add_shortcode('mango_accor_content', array($this, 'mango_accor_content'));
            add_shortcode('mango_accor_container', array($this, 'mango_accor_container'));
            add_shortcode('your_gallery', array($this, 'your_gallery'));
            add_shortcode('single_img', array($this, 'single_img'));
            add_shortcode('mango_woocommece_cat', array($this, 'mango_woocommece_cat'));
            add_shortcode('mango_newsletter', array($this, 'mango_newsletter'));
            add_shortcode('mango_store', array($this, 'mango_store'));
            add_shortcode('mango_login', array($this, 'mango_login'));
            add_shortcode('mango_woo_single_product', array($this, 'mango_woo_single_product'));
            add_shortcode('mango_bootstrap_slider', array($this, 'mango_bootstrap_slider'));
            add_shortcode('mango_add_bootstrap_slider', array($this, 'mango_add_bootstrap_slider'));
            add_shortcode('mango_tooltips_button', array($this, 'mango_tooltips_button'));
            add_shortcode('mango_categoreies_product', array($this, 'mango_categoreies_product'));
            add_shortcode('mango_text_tooltip', array($this, 'mango_text_tooltip'));
            add_shortcode('mango_portfolio', array($this, 'mango_portfolio'));
            add_shortcode('mango_single_categories', array($this, 'mango_single_categories'));
            add_shortcode('mango_feature_product', array($this, 'mango_feature_product'));
            add_shortcode('mango_registration', array($this, 'mango_registration'));
            add_shortcode('mango_client_carosil', array($this, 'mango_client_carosil'));
            add_shortcode('mango_products_list_grid', array($this, 'mango_grid_list_products'));			add_shortcode('mango_pro_item_grid', array($this, 'mango_pro_item_grid'));   
            add_action('wp_enqueue_scripts', array($this, 'loadCssAndJs'));
        }
        public function integrateWithVC()
        {
            // Check if Visual Composer is installed
            if (!defined('WPB_VC_VERSION')) {
                // Display notice that Visual Compser is required
                add_action('admin_notices', array($this, 'showVcVersionNotice'));
                return;
            }
            /*
            Add your Visual Composer logic here.
            Lets call vc_map function to "register" our custom shortcode within Visual Composer interface.
            More info: http://kb.wpbakery.com/index.php?title=Vc_map
            */
            require_once(mangocore_template_dir . 'vc_extend/vc_map.php');
            if (class_exists('WooCommerce')) {
                require_once(mangocore_template_dir . 'vc_extend/vc_map_wc.php');
            }
        }
        /*
        Shortcode logic how it should be rendered
        */
        public function renderMyBartag($atts)
        {
            extract(shortcode_atts(array(
                'foo' => 'something',
                'color' => '#FF0000'
            ), $atts));
            $content = wpb_js_remove_wpautop($content, true); 
            $output = "<div style='color:{$color};' data-foo='${foo}'>{$content}</div>";
            return $output;
        }
        //Mango Categories
        public function mango_category($atts)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'title' => '',
                'sub_title' => '',
                'button_text' => '',
                'button_link' => '',
                'description' => '',
                'animation_type' => '',
                'animation_delay' => ''
            ), $atts));
            $img_active_src = wp_get_attachment_image_src($img_active, 'full');
            $output = '';
            if ($img_active_src || $title || $sub_title || $description || $button_link || $button_text) {
                $output .= '<div class="banner-container container-fluid no-padding">';
					$output .= '<div class="banner-container banner vcentered">';
						if (empty($img_active_src[0])) {
							$image = plugin_dir_url(__DIR__) . "img/dummy-img.jpg";
							$output .= '<img src="' . esc_url($image) . '" alt="' . esc_attr($title) . '">';
						} else {
							$output .= '<img src="' . esc_url($img_active_src[0]) . '" alt="' . esc_attr($title) . '">';
						}
						$output .= '<div class="banner-content text-center wow fadeInUp animated" style="visibility: visible;">';
							$output .= '<div class="vcenter-container">';
							$output .= '<div class="vcenter">';
								$output .= '<h3>' . esc_attr($sub_title) . ' <span>' . esc_attr($title) . '</span></h3>';
								$output .= '<p>' . esc_attr($description) . '</p>';
								if ($button_text) {
									$output .= '<a href="' . esc_url($button_link) . '" class="btn btn-white btn-border btn-sm min-width-xs">' . esc_attr($button_text) . '</a>';
								}
								$output .= '</div><!-- End .vcenter -->';
							$output .= '</div><!-- End .vcenter-container -->';
						$output .= '</div><!-- End .banner-content -->';
					$output .= '</div><!-- End .banner -->';
                $output .= '</div>';
            }
            return $output;
        }
        //Mango Banner 1
        public function mango_banner($atts,$content = ''){
            extract(
                shortcode_atts(
                    array(
                        'img_active' => '',
                        'title' => '',
                        'sub_title' => '',
                        'button_text' => '',
                        'button_link' => '',
                        'mango_font' => 'classy'
                    ), $atts)
            );
            $img_active_src = wp_get_attachment_image_src($img_active, 'full');
            $output = '';
            if ($title || $sub_title || $button_link || $button_text) 
			{
                if ( $mango_font == 'banner-color' || $mango_font == 'classy' ) {
                    $output .= '<div class="banner banner-classy">';
                } elseif ( $mango_font == 'mini' ) {
                    $output  .= '<div class="banner banner-mini">';
                }
                if (empty($img_active_src[0])) {
                    $image = plugin_dir_url(__DIR__) . "img/dummy-img.jpg";
                    $output .= '<img src="' . esc_url($image) . '" alt="' . esc_attr($title) . '">';
                } else {
                    $output .= '<img src="' . esc_url($img_active_src[0]) . '" alt="' . esc_attr($title) . '">';
                }
					$output .= '<div class="banner-content">';
						$output .= '<div class="vcenter-container">';
							$output .= '<div class="vcenter">';
							$output .= '<h3 class="' . esc_attr($mango_font) . '">' . esc_attr($sub_title) . ' <span> ' . esc_attr($title) . '</span></h3>';
						$output .= '<a class="' . esc_attr($mango_font) . '" href="' . esc_url($button_link) . '">' . esc_attr($button_text) . '</a>';
					$output .= '</div></div></div></div>';
            }
            return $output;
        }
        //Mango Shipping
        public function mango_shipping($atts){
            extract(shortcode_atts(array(
                'img_active' => '',
                'heading' => '',
                'description' => '',
                'color' => ''
            ), $atts));
            $img_active_src = wp_get_attachment_image_src($img_active, 'full');
            $output = '';
            if (!$img_active_src && $heading) {
                $output .= '<div class="banner banner-info ' . esc_attr($color) . '">';
					$output .= '<div class="banner-info-wrapper">';
						$output .= '<h4>' . esc_attr($heading) . '</h4>';
						$output .= '<p>' . esc_textarea($description) . '</p>';
					$output .= '</div><!-- End .banner-info-wrapper -->';
                $output .= '</div><!-- End .banner-info -->';
            }
            if ($img_active_src) {
                $output .= ' <div class="banner banner-info banner-info-icon ' . esc_attr($color) . '">';
					$output .= '<div class="banner-info-wrapper">';
						$output .= ' <div class="banner-info-cell banner-icon">';
							$output .= '<img src="' . esc_url($img_active_src[0]) . '" alt="' . esc_attr($heading) . '">';
								$output .= '</div><!-- End .banner-info-cell -->';
								$output .= '<div class="banner-info-cell">';
									$output .= '<h4>' . esc_attr($heading) . '</h4>';
									$output .= '<p>' . esc_textarea($description) . '</p>';
								$output .= '</div><!-- End .banner-info-cell -->';
					$output .= '</div><!-- End .banner-info-wrapper -->';
                $output .= '</div><!-- End .banner-info -->';
            }
            return $output;
        }
        //Mango Blog
        public function mango_blog($atts)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'heading' => '',
                'description' => '',
                'button_text' => '',
                'button_link' => '',
            ), $atts));
            $img_active_src = wp_get_attachment_image_src($img_active, 'full');
            $output = '';
            IF ($img_active_src || $heading || $description || $button_text || $button_link) {
                $output .= '<div class="from-blog-container">';
					$output .= '<h3 class="title-border-bottom">' . esc_attr($heading) . '</h3>';
						$output .= '<div class="clearfix">';
							$output .= '<figure>';
								   $output .= '<img class="img-responsive"  src="' . esc_url($img_active_src[0]) . '"  alt="' . esc_attr($heading) . '">';
								$output .= '</figure>';
								$output .= '<p>' . esc_textarea($description) . '</p>';
						$output .= '<p class="informations-widget"><a href="' . esc_url($button_link) . '">' . esc_attr($button_text) . '</a></p>';
						$output .= '</div>';
                $output .= '</div><!-- End .company-info -->';
            }
            return $output;
        }
//latest post
        function latest_posts($atts)
        {
            $atts = shortcode_atts(array(
                'no_of_posts' => '5',
                'heading' => __('Latest Post', 'mango'),
                'text' => '',
                'link' => '',
                'post_cats' => '',
                'post_per_column' => '',
                'category_select' => '',
            ), $atts);
            extract($atts);
            $output = $condition = '';
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => $no_of_posts,
                'ignore_sticky_posts' => 1
            );
            $args['cat'] = $post_cats;
            $query_tm = new WP_Query();
            $query_tm->query($args);
            if ($query_tm->have_posts()) {
                if ($text) {
                    $condition = '<a class="pull-right hidden-xs" href="' . esc_url($link) . '">' . esc_attr($text) . ' <i class="fa fa-angle-double-right"></i> </a>';
                }
                if ($heading) {
                    $output .= ' <h3 class="carousel-title border-bottom">' . esc_attr($heading) . ' ' . ' ' . $condition . '</h3>';
                }
                $output .= '<div class="owl-carousel home-latestblog-carousel"  data-number-of-col="' . esc_attr($post_per_column) . '" >';
                while ($query_tm->have_posts()) {
                    $query_tm->the_post();
                    $post_id = get_the_ID();
                    $post_format = get_post_format($post_id);
                    $output .= '<article class="entry">';
						$output .= '<div class="entry-media">';
							if (has_post_thumbnail($post_id)) {
								$output .= '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail($post_id,"4col-portfolio") . '</a>';
							} else {
							$output .= '<figure>';
								$image = plugin_dir_url(__DIR__) . "img/dummy-img.jpg";
								$output .= '<a href="' . get_the_permalink() . '"><img src=' . esc_url($image) . '></a>';
							$output .= '</figure>';
                    }
						$output .= '</div><!-- End .entry-media -->';
                    $output .= '  <h2 class="entry-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
						$output .= '<div class="entry-meta">' . __("Posted", 'mango') . '<span>' . get_the_time('d M Y') . '</span>';
						$output .= '</div>';
                    $output .= '</article>';
                }
                wp_reset_query();
                $output .= '</div>';
            }
            return $output;
        }
//clients
        function mango_clients($atts)
        {
            $atts = shortcode_atts(array(
                'no_of_posts' => '2',
                'heading' => __('Clients', 'mango'),
                'style_select' => ''
            ), $atts);
            extract($atts);
            $output = '';
            if ($style_select == 'style1') {
                $output .= '<div class="producents-container">';
					$output .= '<h2 class="title-underblock small"><span>' . esc_attr($heading) . '</span></h2>';
					$args = array('post_type' => 'clients', 'posts_per_page' => $no_of_posts, 'ignore_sticky_posts' => 1);
					$client_query = new WP_Query($args);
						$output .= '<div class="row">';
							if ($client_query->have_posts()) : while ($client_query->have_posts()) : $client_query->the_post();
							$client_url = (get_post_meta(get_the_ID(), 'mango_client_url', true) != '') ? get_post_meta(get_the_ID(), 'mango_client_url', true) : '#';
							$output .= '<a href="' . esc_url($client_url) . '" title="client">' . get_the_post_thumbnail(get_the_ID(), 'thumb_client') . '</a>';
							endwhile; endif;
							wp_reset_query();
						$output .= '</div><!-- End .row -->';
                $output .= '</div><!-- End .producents-container -->';
            }
            if ($style_select == 'style2') {
                $output .= '   <h3 class="widget-title big">' . esc_attr($heading) . '</h3>';
                $output .= '  <div class="producents-widget">';
					$output .= ' <div class="producents-widget-wrapper">';
						$output .= '<div class="row">';
							$args = array('post_type' => 'clients', 'posts_per_page' => $no_of_posts, 'ignore_sticky_posts' => 1);
						$client_query = new WP_Query($args);
						if ($client_query->have_posts()) : while ($client_query->have_posts()) : $client_query->the_post();
							$client_url = (get_post_meta(get_the_ID(), 'mango_client_url', true) != '') ? get_post_meta(get_the_ID(), 'mango_client_url', true) : '#';
							$output .= '<a href="' . get_the_permalink() . '" title="client">' . get_the_post_thumbnail(get_the_ID(), 'thumb_client') . '</a>';
						endwhile; endif;
						$output .= '</div><!-- End .row -->';
					$output .= ' </div><!-- End .producents-widget-wrapper -->';
					$output .= ' <a href="' . get_the_permalink() . '" class="more-link">' . __("View producents catalog", "mango") . '</a>';
                $output .= '</div><!-- End .producents-widget -->';
            }
            return $output;
        }
//clients Carosil
        function mango_client_carosil($atts)
        {
            $atts = shortcode_atts(array(
                'heading' => '',
            ), $atts);
            extract($atts);
            $output = '';
            if (!empty($heading)) {
                $output .= '   <h3 class="#">' . esc_attr($heading) . '</h3>';
            }
            $output .= '<div class="partners-container">';
				$output .= ' <div class="owl-carousel our-partners center-nav">';
					$args = array('post_type' => 'clients', 'ignore_sticky_posts' => 1);
					$client_query = new WP_Query($args);
					if ($client_query->have_posts()) : while ($client_query->have_posts()) : $client_query->the_post();
						$client_url = (get_post_meta(get_the_ID(), 'mango_client_url', true) != '') ? get_post_meta(get_the_ID(), 'mango_client_url', true) : '#';
					$output .= '  <a href="' . get_the_permalink() . '" title="Client Name">' . get_the_post_thumbnail(get_the_ID(), 'thumb_client') . '</a>';
					endwhile; endif;
				$output .= '</div><!-- End .our-partners -->';
            $output .= ' </div>';
            return $output;
        }
//clients Testimonials
        function mango_testimonials($atts)
        {
            $atts = shortcode_atts(array(
                'no_of_posts' => '2',
                'heading' => __('Testimonials', 'mango')
            ), $atts);
            extract($atts);
            $output = '';
            $add_animation = '';
            
            $output .= ' <div class="latest-reviews small">';
				$output .= ' <h3 class="title-border-bottom">' . esc_attr($heading) . '</h3>';
				   $output .= '<div class="owl-carousel testimonials-slider">';
						$args = array('post_type' => 'testimonial', 'posts_per_page' => $no_of_posts, 'ignore_sticky_posts' => 1);
						$testimonial_query = new WP_Query($args);
            
					if ($testimonial_query->have_posts()) : while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
					$testimonials_url = (get_post_meta(get_the_ID(), 'mango_testimonial_url', true) != '') ? get_post_meta(get_the_ID(), 'mango_testimonial_url', true) : '#';
					$output .= '<div class="testimonial">';
						$output .= '<blockquote>';
							$output .= '<p>' . get_the_content() . '</p>';
						$output .= ' <cite><span>' . get_the_title() . '</span>, ' . human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago</cite>';
						$output .= '</blockquote>';
					$output .= '</div><!-- End .testimonial -->';
				endwhile; endif;
				wp_reset_query();
				$output .= '</div><!-- End .testimonials-slider -->';
			$output .= '</div><!-- end .latest-reviews -->';
            return $output;
        }
        //Mango Categories 1
        public function mango_category_fix($atts)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'title' => '',
                'sub_title' => '',
                'description' => ''
            ), $atts));
            $img_active_src = wp_get_attachment_image_src($img_active, 'full');
            $output = '';
            if ($img_active_src || $sub_title || $description || $title) {
                $output .= '<div class="banner banner-tech fixheight">';
                $output .= '<img src="' . esc_url($img_active_src[0]) . '"alt="'. esc_attr($title) .'">';
					$output .= '<a href="#">';
						$output .= '<div class="banner-content">';
								$output .= '<div class="vcenter-container">';
									$output .= '<div class="vcenter">';
										$output .= '<h3>' . esc_attr($sub_title) . ' <span>' . esc_attr($title) . '</span></h3>';
										$output .= '<p>' . esc_attr($description) . '</p>';
									$output .= '</div><!-- End .vcenter -->';
								$output .= '</div><!-- End .vcenter-container -->';
						$output .= '</div><!-- End .banner-content -->';
					$output .= '</a>';
                $output .= '</div><!-- End .banner -->';
            }
            return $output;
        }
        // Mango Categories 2
        public function mango_category_side($atts)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'title1' => '',
                'title2' => '',
                'price' => '',
                'button_text' => '',
                'button_link' => '',
            ), $atts));
            $img_active_src = wp_get_attachment_image_src($img_active,'full');
            $output = '';
            If ($img_active_src || $title1 || $title2 || $price || $button_text) {
                $output .= '<div class="banner banner-tech side">';
					$output .= '<img src="' .esc_url($img_active_src[0]). '" alt="'. esc_attr($title1) .'">';
					$output .= ' <div class="banner-content">';
						$output .= '<div class="vcenter-container">';
							$output .= '<div class="vcenter">';
								$output .= '<h3>' . esc_attr($title1) . ' <br> ' . esc_attr($title2) . '</h3>';
								$output .= '<span class="banner-price">' . esc_attr($price) . '</span>';
									if ($button_text) 
									{
									$output .= '<a href="' . esc_url($button_link) . '" class="btn btn-sm btn-white min-width-xs">' . esc_attr($button_text) . '</a>';
									}
							$output .= '</div><!-- End .vcenter -->';
						$output .= '</div><!-- End .vcenter-container -->';
					$output .= '</div><!-- End .banner-content -->';
                $output .= '</div><!-- End .banner -->';
            }
            return $output;
        }
        //Mango Banner Long
        public function mango_banner_long($atts)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'title' => '',
                'price' => '',
                'description' => '',
                'button_text' => '',
                'button_link' => ''
            ), $atts));
            $img_active_src = wp_get_attachment_image_src($img_active, 'full');
            $output = '';
            if ($img_active_src || $title || $price || $description || $button_text) {
                $output .= '<div class="banner banner-long  fadeInRight">';
					$output .= '<img src="' . esc_url($img_active_src[0]) . '" alt="' . esc_attr($title) . '">';
					$output .= '<div class="banner-content">';
							$output .= '<h3>' . esc_attr($title) . '</h3>';
								$output .= '<div class="banner-price">' . esc_attr($price) . '</div>';
								$output .= '<p>' . esc_attr($description) . '</p>';
							$output .= '<a href="' . esc_url($button_link) . '" class="btn btn-custom3 btn-sm min-width-xs">' . esc_attr($button_text) . '</a>';
					$output .= '</div><!-- End .banner-content -->';
                $output .= '</div><!-- End .banner -->';
            }
            return $output;
        }
        //Mango promated categories
        public function mango_promated_categories($atts)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'heading' => '',
                'category_select' => '',
                'number_cat' => ''
            ), $atts));
            if ($category_select != 'category') {
                if (!taxonomy_exists($category_select)) {
                    return;
                }
            }
            $img_active_src = wp_get_attachment_image_src($img_active, 'full');
            $output = '';
				$taxonomy = $category_select;
				$orderby = 'name';
				$show_count = 0;      // 1 for yes, 0 for no
				$pad_counts = 0;      // 1 for yes, 0 for no
				$hierarchical = 1;      // 1 for yes, 0 for no
				$title = '';
				$num = $number_cat;
				$empty = 0;
				$arg = array(
					'taxonomy' => $taxonomy,
                'orderby' => $orderby,
                'show_count' => $show_count,
                'pad_counts' => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li' => $title,
                'number' => $num,
                'hide_empty' => $empty
            );
            $all_categories = get_categories($arg);
            if ($img_active_src || $heading) {
                $output .= '<div class="category-box category-box-vertical category-box-clean">';
					$output .= '<figure><img src="' . esc_url($img_active_src[0]) . '" alt="' . esc_attr($heading) . '"></figure>';
					$output .= '<div class="category-box-content">';
						$output .= '<h3>' . esc_attr($heading) . '</h3>';
							$output .= '<ul class="category-list category-list-small">';
							foreach ($all_categories as $cate) {
							if ($category_select == 'product_cat') {
							$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
							}
							if ($category_select == 'faq-category') {
							$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
							}
							if ($category_select == 'category') {
							$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
							}
							}
						$output .= '</ul>';
					$output .= '</div><!-- End .category-box-content -->';
                $output .= ' </div><!-- End .category-box -->';
            }
            return $output;
        }
        
		 public function mango_categories_list($atts)

        {

            extract(shortcode_atts(array(

                'img_active' => '',

                'heading' => '',

                'sub_title' => '',

                'big_title' => '',

                'button_text' => '',

                'button_link' => '',

                'category_select' => '',

                'number_cat' => '',
				
				'woocommerce_parent_categories'=>'',
				
				'faqs_parent_categories'=>'',
				
				'post_parent_categories'=>''
				
				

            ), $atts));

            if ($category_select != 'category') {

                if (!taxonomy_exists($category_select)) {

                    return;

                }

            }

				$img_active_src = wp_get_attachment_image_src($img_active, 'full');

				$output = '';
				
				
			
				
				$taxonomy = $category_select;
				$orderby = 'name';
			$show_count = 0;      // 1 for yes, 0 for no
				$pad_counts = 0;      // 1 for yes, 0 for no
				$hierarchical = 1;      // 1 for yes, 0 for no
			$title = '';
			$num = $number_cat;
				$empty = 0;
				$arg = array(
				'taxonomy' => $taxonomy,
               'orderby' => $orderby,
               'show_count' => $show_count,
               'pad_counts' => $pad_counts,
               'hierarchical' => $hierarchical,
               'title_li' => $title,
                'number' => $num,
                'hide_empty' => $empty,
				'parent'=>0
				);

            $parents = get_categories($arg);
			
			

            if ($img_active_src || $sub_title || $big_title || $button_text || $heading) {

                $output .= '<div class="banner banner-box">';

					$output .= '<img src="'. esc_url($img_active_src[0]) .'"  alt="'. esc_attr($heading) .'">';

					$output .= '<div class="row">';

						$output .= '<div class="col-sm-6 col-sm-push-6 col-md-12 col-md-push-0 col-lg-6 col-lg-push-6">';

							$output .= '<div class="banner-content">';

								$output .= '<h4>'.esc_attr($sub_title).'</h4>';

								$output .= '<h2><span>'.esc_attr($big_title).'</span></h2>';

								$output .= '<a href="'.esc_url($button_link).'">'.esc_attr($button_text).'</a>';

							$output .= '</div><!-- End .banner-content -->';

						$output .= ' </div><!-- End .col-sm-6 -->';

						$output .= '<div class="col-sm-6 col-sm-pull-6 col-md-12 col-md-pull-0 col-lg-6 col-lg-pull-6">';

							$output .= '<h3>'.esc_attr($heading).'</h3>';

							$output .= '<ul class="banner-category-list">';

							
									
									

									if ($category_select == 'product_cat') {
										if($woocommerce_parent_categories){
									$category = get_term_by('slug', $woocommerce_parent_categories, 'product_cat');
											$args = array(
											'child_of'                 => $category->term_id,
											'orderby'                  => 'name',
											'order'                    => 'ASC',
											'hide_empty'               => FALSE,
											'hierarchical'             => 1,
											'taxonomy'                 => 'product_cat',
											'number' => $number_cat,
											); 
										
										$child_categories = get_categories($args );
	
										foreach($child_categories as $cate){
										$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>'.$cate->name.'</a></li>';
										}
										}else{
											foreach($parents as $cate){
										$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>'.$cate->name.'</a></li>';
										}
										}
										
									}

									if ($category_select == 'faq-category') {
											if($faqs_parent_categories ){
										$faqs = get_term_by('slug', $faqs_parent_categories, 'faq-category');
											$args = array(
											'child_of'                 => $faqs->term_id,
											'orderby'                  => 'name',
											'order'                    => 'ASC',
											'hide_empty'               => FALSE,
											'hierarchical'             => 1,
											'taxonomy'                 => 'faq-category',
											'number' => $number_cat,
											); 
											$child_categories = get_categories($args );
									
										foreach ($child_categories as $cate) {
										$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
										}
										}else{
											
											
											foreach($parents as $cate){
												$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
											}
											
										}
								}

								if ($category_select == 'category') {
									if($post_parent_categories){
											$post = get_term_by('slug', $post_parent_categories, 'category');
											$args = array(
											'child_of'                 => $post->term_id,
											'orderby'                  => 'name',
											'order'                    => 'ASC',
											'hide_empty'               => FALSE,
											'hierarchical'             => 1,
											'taxonomy'                 => 'category',
											'number' => $number_cat,
											); 
											$child_categories = get_categories($args );
											
											foreach ($child_categories as $cate) {
											$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
											}
											}else{
												
											
											foreach($parents as $cate){
												$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
											}
											}
								}


							$output .= ' </ul>';

						$output .= '</div><!-- End .col-sm-6 -->';

					$output .= ' </div><!-- End .row -->';

                $output .= '</div><!-- End .banner-box -->';

            }

            return $output;

        }
		
		
        // Mango Discount Box
        public function mango_discount_box($atts)
        {
            extract(shortcode_atts(array(
                'title' => '',
                'title_color' => '',
                'sub_title' => '',
                'description' => '',
                'badge' => '',
                'badge_color' => ''
            ), $atts));
            $output = "";
            if ($title || $title_color || $sub_title || $description || $badge || $badge_color) {
                $output .= '<div class="discount-box-wrapper last">';
					$output .= '<div class="discount-box">';
					$output .= '<span class="label label-hot rotated ' . esc_attr($badge_color) . '">' . esc_attr($badge) . '</span>';
							$output .= '<div class="discount-box-cell discount-cell">';
								$output .= '<span class="discount-box-value ' . esc_attr($title_color) . '">' . esc_attr($title) . '</span>';
									$output .= '<h5 class="discount-title">' . esc_attr($sub_title) . '</h5>';
								$output .= '</div><!-- End .discount-box-cell -->';
							$output .= '<div class="discount-box-cell">';
							$output .= '<p>' . esc_textarea($description) . '</p>';
						$output .= '</div><!-- End .discount-box-cell -->';
					$output .= '</div><!-- End .discount-box -->';
                $output .= '</div><!-- End .discount-box-wrapper -->';
            }
            return $output;
        }
        // Mango Vine Box
        public function mango_banner_vine($atts)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'title' => '',
                'sub_title' => '',
                'description' => '',
                'link' => ''
            ), $atts));
            $img_active_src = wp_get_attachment_image_src($img_active, 'full');
            $output = '';
            if ($title || $sub_title || $description || $link || $img_active) {
                $output .= '<div class="banner banner-vine">';
                $output .= '<img src="' . esc_url($img_active_src[0]) . '" alt="' . esc_attr($title) . '">';
					$output .= '<a href="' . esc_url($link) . '">';
						$output .= '<div class="banner-content">';
							$output .= '<div class="vcenter-container">';
								$output .= '<div class="vcenter">';
									$output .= '<h3>' . esc_attr($sub_title) . '</h3>';
									$output .= '<h2>' . esc_attr($title) . '</h2>';
									$output .= '<p>' . esc_textarea($description) . '</p>';
								$output .= '</div><!-- End .vcenter -->';
							$output .= '</div><!-- End .vcenter-container -->';
						$output .= '</div><!-- End .banner-content -->';
					$output .= '</a>';
                $output .= '</div><!-- End .banner -->';
            }
            return $output;
        }
        // Mango Category Box
        public function mango_category_box($atts)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'heading' => '',
                'description' => '',
                'category_select' => '',
                'number_cat' => '',
                'badge' => '',
                'badge_color' => ''
            ), $atts));
            if ($category_select != 'category') {
                if (!taxonomy_exists($category_select)) {
                    return;
                }
            }
				$img_active_src = wp_get_attachment_image_src($img_active, 'full');
				$output = '';
				$taxonomy = $category_select;
				$orderby = 'name';
				$show_count = 0;      // 1 for yes, 0 for no
				$pad_counts = 0;      // 1 for yes, 0 for no
				$hierarchical = 1;      // 1 for yes, 0 for no
				$title = '';
				$num = $number_cat;
				$empty = 0;
				$arg = array(
					'taxonomy' => $taxonomy,
                'orderby' => $orderby,
                'show_count' => $show_count,
                'pad_counts' => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li' => $title,
                'number' => $num,
                'hide_empty' => $empty
            );
            $all_categories = get_categories($arg);
            $image = str_replace("/", "\\", $img_active_src[0]);
            $image2 = str_replace("//", "//", $img_active_src[0]);
            $img = 'background-image:url(' . $image2 . ')';
            if ($heading || $description) {
                $output .= '<div class="category-box-container">';
					$output .= ' <div class="category-box" style="' . $img . '">';
						 $output .= '<span class="label label-hot rotated ' . esc_textarea($badge_color) . '">' . esc_textarea($badge) . '</span>';
						$output .= '<div class="category-box-content">';
						$output .= '<h3>' . esc_attr($heading) . '</h3>';
						$output .= '<p>' . esc_textarea($description) . '</p>';
						$output .= '<ul class="category-list">';
						foreach ($all_categories as $cate) {
							if ($category_select == 'product_cat') {
								$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
							}
							if ($category_select == 'faq-category') {
								$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
							}
							if ($category_select == 'category') {
								$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
							}
						}
						$output .= '</ul>';
						$output .= '</div><!-- End .category-box-content -->';
					$output .= '</div><!-- End .category-box -->';
                $output .= ' </div><!-- End .category-box-container -->';
            }
            return $output;
        }
        // Mango Vartical Category
        public function mango_vertical_categories($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'heading' => '',
                'category_select' => '',
                'number_cat' => '',
                'badge' => '',
                'badge_color' => ''
            ), $atts));
            if ($category_select != 'category') {
                if (!taxonomy_exists($category_select)) {
                    return;
                }
            }
				$img_active_src = wp_get_attachment_image_src($img_active, 'full');
				$output = '';
				$taxonomy = $category_select;
				$orderby = 'name';
				$show_count = 0;      // 1 for yes, 0 for no
				$pad_counts = 0;      // 1 for yes, 0 for no
				$hierarchical = 1;      // 1 for yes, 0 for no
				$title = '';
				$num = $number_cat;
				$empty = 0;
				$arg = array(
					'taxonomy' => $taxonomy,
                'orderby' => $orderby,
                'show_count' => $show_count,
                'pad_counts' => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li' => $title,
                'number' => $num,
                'hide_empty' => $empty
            );
            $all_categories = get_categories($arg);
            if ($heading) {
                $output .= '<div class="category-box-container">';
					$output .= '<div class="category-box category-box-vertical">';
					$output .= '<span class="label label-hot rotated ' . esc_textarea($badge_color) . '">' . esc_textarea($badge) . '</span>';
					$output .= '<figure><img src="' . esc_url($img_active_src[0]) . '" alt="Banner"></figure>';
						$output .= '<div class="category-box-content">';
						$output .= '<h3>' . esc_attr($heading) . '</h3>';
						$output .= '<ul class="category-list">';
						foreach ($all_categories as $cate) {
							if ($category_select == 'product_cat') {
								$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
							}
							if ($category_select == 'faq-category') {
								$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
							}
							if ($category_select == 'category') {
								$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
							}
						}
						$output .= '</ul>';
						$output .= '</div><!-- End .category-box-content -->';
					$output .= '</div><!-- End .category-box -->';
                $output .= '</div><!-- End .category-box-container -->';
            }
            return $output;
        }
        // Mango Vertical banner
        public function mango_vertical_banner($atts)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'title' => '',
                'sub_title' => '',
                'button_text' => '',
                'button_link' => ''
            ), $atts));
            $img_active_src = wp_get_attachment_image_src($img_active, 'full');
            $output = '';
				$output .= '<div class="banner vertical-banner">';
					$output .= '<img src="' . $img_active_src[0] . '" alt="' . esc_attr($title) . '">';
						$output .= '<div class="banner-content text-center text-uppercase  fadeInUp">';
							$output .= '<h2>' . esc_attr($sub_title) . '<span>' . esc_attr($title) . '</span></h2>';
								$output .= '</div><!-- End .banner-content -->';
							$output .= '<div class="banner-action  fadeInDown"><a href="' . esc_attr($button_link) . '" class="btn btn-white btn-sm min-width-xs" title="Shop Now">' . esc_attr($button_text) . '</a></div>';
				$output .= '</div>';
            return $output;
        }
        // Mango Woocommerce Categories
        public function mango_woocommece_cat($atts)
        {
            extract(shortcode_atts(array(
                'heading' => '',
                'style' => '',
                'number_cat' => ''
            ), $atts));
            if (!taxonomy_exists("product_cat")) {
                return;
            }
				$output = '';
				$taxonomy = 'product_cat';
				$orderby = 'name';
				$show_count = 0;    
				$pad_counts = 0;      
				$hierarchical = 1;      
				$title = '';
				$num = $number_cat;
				$empty = 0;
				$arg = array(
					'taxonomy' => $taxonomy,
                'orderby' => $orderby,
                'show_count' => $show_count,
                'pad_counts' => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li' => $title,
                'number' => $num,
                'hide_empty' => $empty
            );
            $all_categories = get_categories($arg);
            if ($style == "style1") {
                $output .= '<aside class=" widget-home-widget">';
					$output .= '<div class="widget widget-menu">';
							$output .= '<div class="widget-category-menu">';
							$output .= '<h3>' . esc_attr($heading) . '</h3>';
						$output .= '<ul>';
						foreach ($all_categories as $cate) {
							$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"><i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
						}
						$output .= '</ul>';
						$output .= '</div><!-- End .widget-category-menu -->';
					$output .= '</div><!-- End .widget-category-menu -->';
                $output .= '</aside>';
            }
            if ($style == "style2") {
                $output .= ' <div class="widget-category-menu category-menu-parted">';
                $output .= ' <ul>';
                foreach ($all_categories as $cate) {
                    $output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"><i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
                }
                $output .= '</ul>';
                $output .= ' </div><!-- End .widget-category-menu -->';
            }
            if ($style == 'style3') {
                $output .= '<div class="widget category-widget-box">';
					$output .= ' <h3 class="#">' . esc_attr($heading) . '</h3>';
						$output .= ' <ul id="category-widget">';
						$all_categories = get_categories($arg);
						foreach ($all_categories as $cat) {
						$args = array(
                        'child_of' => $cat->term_id,
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'hide_empty' => FALSE,
                        'hierarchical' => 1,
                        'taxonomy' => 'product_cat',
						);
							$child_categories = get_categories($args);
							if ($child_categories) {
							$output .= '<li class="open"><a href="' . get_term_link($cat->slug, $cat->taxonomy) . '">' . $cat->name . ' <span 	class="category-widget-btn"><i class="fa fa-angle-bottom"></i></span></a>';
							} else {
							$output .= ' <li class="open"><a href="' . get_term_link($cat->slug, $cat->taxonomy) . '">' . $cat->name . ' </a>';
							}
						echo $tr;
						if (!empty($child_categories)) {
                        $output .= '<ul>';
                        foreach ($child_categories as $subcat) {
                            $output .= '<li><a href="' . get_term_link($subcat->slug, $subcat->taxonomy) . '">' . $subcat->name . '</a></li>';
                        }
                        $output .= '</ul>';
                    }
                    $output .= '</li>';
                }
                $output .= '</div><!-- End .widget -->';
            }
            return $output;
        }
        // Mango Newsletter
        public function mango_newsletter($atts)
        {
            extract(shortcode_atts(array(
                'heading' => '',
                'description' => '',
                'select_form' => ''
            ), $atts));
			$output="";
            if ($heading || $description) {
                $output .= '<div class="newsletter-box">';
                if ($select_form) {
                    $output .= '<div class="newsletter-box-form">';
						$shortcode = "[subscribe2  hide='Unsubscribe']";
						$output .= do_shortcode($shortcode);
                    $output .= '</div>';
                }
                $output .= '<div class="newsletter-box-content">';
					$output .= '<h3>' . esc_attr($heading) . '</h3>';
					$output .= '<p>' . esc_attr($description) . '</p>';
					$output .= '</div>';
                $output .= '</div><!-- End .newsletter-box -->';
            }
            return $output;
        }
        // Mango Store
        public function mango_store($atts)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'heading' => '',
                'description' => '',
                'select_form' => ''
            ), $atts));
            $img_active_src = wp_get_attachment_image_src($img_active, 'full');
            $output = '';
            if ($heading || $description || $img_active_src) {
                $output .= '<div id="newsletter-section" class="parallax"  style="background-image: url(' . $img_active_src[0] . ');
				text-align: center;">';
					$output .= '<div class="newsletter-section-content">';
						$output .= '<h2>' . esc_attr($heading) . '</h2>';
							$output .= '<p>' . esc_attr($description) . '</p>';
							if ($select_form) {
								$shortcode = "[subscribe2  hide='Unsubscribe']";
								$output .= do_shortcode($shortcode);
							}
					$output .= ' </div>';
                $output .= ' </div>';
            }
            return $output;
        }
        // Mango Login
        public function mango_login($atts)
        {
            extract(shortcode_atts(array(
                'heading' => '',
                'description' => '',
                'select_form' => ''
            ), $atts));
            $output = '';
            $output .= ' <div class="form-wrapper login-box">';
				$output .= '<h2 class="xs-margin half">' . esc_attr($heading) . '</h2>';
					$output .= '<p class="sm-margin half">' . esc_attr($description) . '</p>';
				if ($select_form == "login") {
                $output .= mango_loginform();
				}
            $output .= ' </div><!-- End .form-wrapper -->';
            return $output;
        }
        // Mango Registeration
        public function mango_registration($atts)
        {
            extract(shortcode_atts(array(
                'heading' => '',
                'description' => '',
                'select_form' => ''
            ), $atts));
            $output = '';
            $output .= '<div class=" register-box last">';
				$output .= ' <h2 class="xs-margin half">' . esc_attr($heading) . '</h2>';
					$output .= '<p class="sm-margin half"> ' . esc_attr($description) . '</p>';
					$output .= ' <p>' . do_shortcode('[mango_user_registeration_form]') . ' </p>';
            $output .= '</div>';
            return $output;
        }
        // Mango Slider
        function mango_bootstrap_slider($atts, $content = null)
        {
            extract(shortcode_atts(array(
                'el_class' => '',
                'heading' => ''
            ), $atts));
			$output="";
            $output .= '<h2 class="md-margin">' . esc_attr($heading) . '</h2>';
				$output .= ' <div id="carousel-example-generic" class="carousel slide mango_bootstrap_slider" data-ride="carousel" data-interval="7000">';
					$output .= ' <div class="carousel-inner">';
						$output .= do_shortcode($content);
					$output .= '</div><!-- End .carousel-inner -->';
						$output .= '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>';
						$output .= '  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>';
				$output .= '  </div>';
            return $output;
        }
        // Add Slide
        function mango_add_bootstrap_slider($atts)
        {
            extract(shortcode_atts(array(
                'img_active' => '',
                'caption' => '',
            ), $atts));
            $output = '';
            $output .= ' <div class="item">';
				$img_src = wp_get_attachment_image_src($img_active, 'full');
				$output .= ' <img src="' . esc_url($img_src[0]) . '" class="img-responsive" alt="' . esc_attr($caption) . '">';
					$output .= ' <div class="carousel-caption">';
						$output .= esc_attr($caption);
					$output .= '</div><!-- End .carousel-caption -->';
            $output .= '</div><!-- End .item -->';
            return $output;
        }
        // Mango Tooltip Button
        public function mango_tooltips_button($atts)
        {
            extract(shortcode_atts(array(
                'button_text' => '',
                'button_color' => '',
                'data_content' => '',
                'button_placement' => ''
            ), $atts));
            $output = '';
            if ($button_text || $button_color || $data_content || $button_placement) {
					$output .= ' <button type="button" class="btn btn-' . esc_attr($button_color) . ' add-popover" data-toggle="popover" data-placement="' . esc_attr($button_placement) . '" title="' . esc_attr($button_text) . '" data-content="' . esc_attr($data_content) . '">' . esc_attr($button_text) . '</button>';
            }
            return $output;
        }
        public function mango_categoreies_product($atts)
        {
            extract(shortcode_atts(array(
                'link_text' => '',
                'heading' => '',
                'categories' => ''
            ), $atts));
            if (!taxonomy_exists("product_cat")) {
                return;
            }
		if(isset($categories)){
			
            $category = get_term_by('slug', $categories, 'product_cat');
			$link=get_term_link( $category->term_id, 'product_cat' ); 
            $thumbnail_id = get_woocommerce_term_meta($category->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_url($thumbnail_id);
            if (empty($image)) {
                $image = plugin_dir_url(__DIR__) . "img/dummy-img.jpg";
            }
		}
            $arg_products= array(
                'post_type' => 'product',
                'cat' => $categories
            );
            $loops = new WP_Query($arg_products);
			$output="";
            while ($loops->have_posts()) {
		global $product;
                $loops->the_post();
	if(isset($product->id)){
                get_the_post_thumbnail($product->id);
	}
            }
            $output .= ' <div class="product-banner-row">';
				$output .= '<div class="banner banner-color small">';
					$output .= '<img src="' . esc_attr($image) . '" alt="' . get_the_title() . '">';
					$output .= '<div class="banner-content">';
						$output .= '<h4>' . esc_attr($heading) . '</h4>';
							$output .= '<h3>' . esc_attr($categories) . '</h3>';
						$output .= '<a href="'.$link.'" title="View Products">' . esc_attr($link_text) . '</a>';
					$output .= '</div><!-- End .banner-content -->';
				$output .= '</div><!-- End .banner -->';
            $output .= '<div class="row-carousel">';
            $output .= ' <div class="owl-carousel banner-row-carousel-first">';
            $args = array('post_type' => 'product', 'product_cat' => $categories, 'orderby' => 'rand');
            $loop = new WP_Query($args);
            while ($loop->have_posts()) {
                $loop->the_post();
                global $product;
                $attr = array('class' => 'product-image');
                $attr2 = array('class' => 'category-image');
                $output .= ' <div class="product-wrap">';
					$output .= '<div class="product text-left">';
						$output .= ' <div class="product-top">';
							if (in_array('yith-woocommerce-compare/init.php', apply_filters('active_plugins', get_option('active_plugins')))) {
							$output .= do_shortcode('[yith_compare_button]');
									}
							if (in_array('yith-woocommerce-wishlist/init.php', apply_filters('active_plugins', get_option('active_plugins')))) {
							$output .= do_shortcode('[yith_wcwl_add_to_wishlist]');
								}
								
										$output .= '<div class="img-effect">';
									$output .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_post_thumbnail($loop->ID, 'shop-image', array("class" => "product-image")) . '</a>';
										
								$attachment_ids = ($product->get_gallery_attachment_ids());
								foreach ($attachment_ids as $attachment_id) {
									$image_link = wp_get_attachment_url($attachment_id);
									$output .= '<a class="hover-img" href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . wp_get_attachment_image($attachment_id, 'shop-image') . '</a>';
								}
								$output .= '</div>';
						$output .= '<div class="product-action-container">';
							$output .= '<a href="' . esc_url($product->add_to_cart_url()) . '" class="product-btn product-add-btn"><i class="fa fa-shopping-cart"></i>' . $product->add_to_cart_text() . '</a>';
						$output .= ' </div><!-- end .product-action-container -->';
					$output .= '</div><!-- End .product-top -->';
					$output .= ' <div class="product-cats"><a href="#" title="Category Name">' . esc_attr($categories) . '</a></div><!-- End .product-cats -->';
						$output .= '<h2 class="product-title"><a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a></h2>';
					if ($rating_html = $product->get_rating_html()) :
						$output .= ' <div class="product-ratings">';
							$count = 0;
							$rating = $product->get_average_rating();
							for ($i = 0; $i < (int)$rating; $i++) {
							$count++;
							$output .= '<span class="star active"></span>';
						}
							if ($rating - (int)$rating >= 0.5) {
								$count++;
								$output .= '<span class="star active-half"></span>';
							}
							for ($i = $count; $i < 5; $i++) {
								$count++;
								$output .= '<span class="star"></span>';
							}
							$output .= ' <span class="rating-amount">';
						$rev_count = $product->get_review_count();
							$output .= $rev_count . " ";
							if ($rev_count == 0 || $rev_count > 1) {
							$output .= "Reviews";
						} elseif ($rev_count == 1) {
                        $output .= "Review";
						}
						$output .= '</span>';
						$output .= '</div><!-- End .product-ratings -->';
							endif;
						$output .= '<div class="product-price-container">';
							if ($product->get_regular_price()) {
								$output .= '<span class="product-old-price">' . get_woocommerce_currency_symbol() . ' ' . $product->get_regular_price() . '</span>';
							}
							if ($product->get_sale_price()) {
							$output .= ' <span class="product-price">' . get_woocommerce_currency_symbol() . ' ' . $product->get_sale_price() . 	'</span>';
							}
							$output .= ' </div><!-- End .product-price-container -->';
					$output .= '</div><!-- End .product -->';
				$output .= '</div><!-- End .product-wrap -->';
					}
			$output .= ' </div><!-- end .banner-row-carousel-first -->';
		$output .= '</div><!-- End .row-carousel -->';
    $output .= '</div><!-- End .product-banner-row -->';
            return $output;
        }
        public function mango_text_tooltip($atts)
        {
            extract(shortcode_atts(array(
                'tooldescription' => '',
                'toolbox' => '',
                'select_tool_dir' => ''
            ), $atts));
		$output="";
            $record = explode(',', $toolbox);
            foreach ($record as $find) {
                $tool = str_replace($find, '<a class="add-tooltip highlight third-color" href="#" data-toggle="tooltip" data-placement="' . esc_attr($select_tool_dir) . '" title="' . esc_attr($find) . '">' . esc_attr($find ). "</a>", esc_attr($tooldescription));
                $output .= '<p>' . $tool . '</p>';
            }
            return $output;
        }
        public function mango_portfolio($atts)
        {
            extract(shortcode_atts(array(
                'number' => '',
                'portfolio_categories' => '',
                'style' => '',
                'hide_title' => '',
                'hide_category' => '',
                'hide_description' => '',
                'hide_link' => ''
            ), $atts));
            $portfolio_select = array(
                'post_type' => 'portfolio',
                'showposts' => $number,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'portfolio-category',
                        'field' => 'slug',
                        'terms' => $portfolio_categories
                    )
                )
            );
    $output ="";
            $portfolio = new WP_Query($portfolio_select);
            while ($portfolio->have_posts()) {
                $portfolio->the_post();
                if ($style == "style1") {
                    $post_id = get_the_ID();
                    $terms = get_the_terms($post_id, $portfolio_categories);
                    if (has_post_thumbnail($post_id)) {
                        $img_src_full = wp_get_attachment_url(get_post_thumbnail_id($post_id, 'full'));
                        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), '4_column');
                    } else {
                        $img_src_full = plugin_dir_url(__DIR__) . "img/dummy-img.jpg";
                        $img_src[0] = plugin_dir_url(__DIR__) . "img/dummy-img.jpg";
                    }
                    $output .= '<div class="portfolio-item popup-gallery">';
						$output .= ' <figure>';
						$output .= ' <a href="' . esc_url($img_src_full) . '" class="zoom-item" title="' . get_the_title() . '"><img src="' . esc_url($img_src[0]) . '" alt="' . get_the_title() . '"></a>';
						$output .= '</figure>';
                    if (!$hide_title) {
                        $output .= ' <h2 class="portfolio-title">';
                        $output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
                    }
                    if (!$hide_category) {
							$output .= '<div class="portfolio-meta-wrapper">';
							$output .= '<span class="portfolio-tags"><a href="' . get_the_permalink() . '">' . esc_attr($portfolio_categories) . '</a></span><!-- End .portfolio-tags -->';
							$output .= ' </div>';
                    }
                    if (!$hide_description) {
                        $output .= '<p>' . get_the_content() . '</p>  ';
                    }
                    $output .= '</div><!-- End .portfolio-item -->';
                }
                if ($style == "style2") {
                    $post_id = get_the_ID();
                    $terms = get_the_terms($post_id, $portfolio_categories);
                    if (has_post_thumbnail($post_id)) {
                        $img_src_full = wp_get_attachment_url(get_post_thumbnail_id($post_id, 'full'));
                        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), '4_column');
                    } else {
                        $img_src_full = sys_template_uri . '/img/preview-570x360.jpg';
                        $img_src[0] = sys_template_uri . '/img/preview-270x170.jpg';
                    }
                    $link = get_post_meta($post_id, 'mango_portfolio_link', true) ? get_post_meta($post_id, 'mango_portfolio_link', true) : '';
                    $output .= '<div class="portfolio-item portfolio-simple popup-gallery">';
						$output .= '<figure>';
						$output .= '<img src="' . esc_url($img_src[0]) . '" alt="' . get_the_title() . '">';
						$output .= ' </figure>';
                    $output .= ' <div class="portfolio-meta">';
						$output .= ' <div class="portfolio-content">';
							if (!$hide_title) {
							$output .= '<h2 class="portfolio-title">';
                        $output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
						}
                    if (!$hide_category) {
                        $output .= '<div class="portfolio-tags"><a href="' . get_the_permalink() . '">' . esc_attr($portfolio_categories) . '</a></div><!-- End .portfolio-tags -->';
                    }
                    $output .= ' <a href="' . esc_url($img_src_full) . '" class="portfolio-btn zoom-item" title="' . get_the_title() . '"><i class="fa fa-search"></i></a>';
                    if ($link) {
                        $output .= '<a href="' . esc_url($link) . '" class="portfolio-btn"><i class="fa fa-link"></i></a>';
                    }
							$output .= '</div><!-- End .portfolio-content -->';
						$output .= '</div><!-- End .portfolio-meta -->  ';
                    $output .= '</div><!-- End .portfolio-item -->';
                }
                if ($style == "style3") {
                    $post_id = get_the_ID();
                    $terms = get_the_terms($post_id, $portfolio_categories);
                    if (has_post_thumbnail($post_id)) {
                        $img_src_full = wp_get_attachment_url(get_post_thumbnail_id($post_id, 'full'));
                        $img_src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), '4_column');
                    } else {
                        $img_src_full = sys_template_uri . '/img/preview-570x360.jpg';
                        $img_src[0] = sys_template_uri . '/img/preview-270x170.jpg';
                    }
                    $output .= ' <div class="portfolio-item portfolio-custom popup-gallery">';
                    $output .= '<figure>';
                    $output .= ' <a href="' . esc_url($img_src_full) . '" class="zoom-item" title="' . get_the_title() . '">';
                    $output .= '<img src="' . esc_url($img_src[0]) . '" alt="' . get_the_title() . '">';
                    $output .= '</a>';
                    $output .= ' <div class="portfolio-meta">';
                    $output .= ' <h2 class="portfolio-title">';
                    if (!$hide_title) {
                        $output .= ' <a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h2>';
                    }
                    if (!$hide_category) {
                        $output .= ' <div class="portfolio-tags"><a href="' . get_the_permalink() . '">' . esc_attr($portfolio_categories) . '</a></div><!-- End .portfolio-tags -->';
                    }
                    $output .= '</div><!-- End .portfolio-meta -->';
                    $output .= '</figure>';
							$output .= '<div class="portfolio-content">';
							if (!$hide_description) {
								$output .= '<p>' . get_the_content() . '</p>';
							}
							if (!$hide_link) {
								$output .= '<a href="' . get_the_permalink() . '" class="entry-readmore">Read More</a>';
							}
							$output .= '</div><!-- End .portfolio-content --> ';
                    $output .= '</div><!-- End .portfolio-item -->';
                }
            }
            return $output;
        }
        // Mango Single Category
        public function mango_single_categories($atts)
        {
            extract(shortcode_atts(array(
                'heading' => '',
                'category_select' => '',
                'number_cat' => ''
            ), $atts));
            if ($category_select != 'category') {
                if (!taxonomy_exists($category_select)) {
                    return;
                }
            }
            $output = "";
				$taxonomy = $category_select;
				$orderby = 'name';
				$show_count = 0; 
				$pad_counts = 0;      
				$hierarchical = 1;      
				$title = '';
				$num = $number_cat;
				$empty = 0;
				$arg = array(
					'taxonomy' => $taxonomy,
                'orderby' => $orderby,
                'show_count' => $show_count,
                'pad_counts' => $pad_counts,
                'hierarchical' => $hierarchical,
                'title_li' => $title,
                'number' => $num,
                'hide_empty' => $empty
            );
            $all_categories = get_categories($arg);
            if ($heading) {
                $output .= '<div class="category-box category-box-vertical">';
					$output .= ' <div class="category-box-content">';
							$output .= '<h3>' . esc_attr($heading) . '</h3>';
								$output .= ' <ul class="category-list">';
									foreach ($all_categories as $cate) {
										if ($category_select == 'product_cat') {
											$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
										}
										if ($category_select == 'faq-category') {
											$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
										}
										if ($category_select == 'category') {
											$output .= '<li><a href="' . get_term_link($cate->slug, $cate->taxonomy) . '"> <i class="fa fa-angle-right"></i>' . $cate->name . '</a></li>';
										}
									}
							$output .= '</ul>';
						$output .= '  </div><!-- End .category-box-content -->';
                $output .= '</div><!-- End .category-box -->';
            }
            return $output;
        }
        // Mango Feature Product
        public function mango_feature_product($atts)
        {
            $output = "";
            extract(shortcode_atts(array(
                'heading' => '',
                'number_cat' => 3,
                'product_select' => '',
                'categories' => ''
            ), $atts));
            if (!taxonomy_exists("product_cat")) {
                return;
            }
            $output .= '<div class="widget">';
					$output .= '<h4>' . esc_attr($heading) . '</h4>';
            $output .= '<ul class="products-list">';
					$query_arg = array(
						'post_type' => 'product',
						'posts_per_page' => $number_cat,
						'product_cat' => $categories
					);
					if ($product_select == 'Featured') {
						$query_arg['meta_key'] = '_featured';
						$query_arg['meta_value'] = 'yes';
					} else if ($product_select == 'best_selling') {
						$query_arg['post__in'] = mango_woocomerce_bestsellers();
					}
			
            $select_feature = new WP_Query($query_arg);
            if ($select_feature->have_posts()) {
                while ($select_feature->have_posts()) {
                    global $product;
						$select_feature->the_post();
						$category = get_term_by('name', $categories, 'product_cat');
						$product = get_product($select_feature->post->ID);
						$output .= ' <li>';
							$img_src = wp_get_attachment_image_src(get_post_thumbnail_id($product->id));
						if (has_post_thumbnail($product->id) && !post_password_required()) {
                        $output .= ' <figure>';
							$output .= ' <a href="' . get_the_permalink() . '">';
							$output .= '  <img src="' . esc_url($img_src[0]) . '" alt="' . get_the_title() . '" class="product-image"></a>';
                        $output .= '</figure>';
						}
							$output .= '<h5 class="product-title">';
						$output .= '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
						$output .= '</h5>';
                    $output .= '<div class="product-price-container">';
					if ($product->get_regular_price() && $product->get_sale_price()) {
					$output .= '<span class="product-old-price">' . get_woocommerce_currency_symbol() . ' ' . $product->get_regular_price() . '</span>';
					  $output .= '<span class="product-price">' . get_woocommerce_currency_symbol() . ' ' . $product->get_sale_price() . '</span>';
					}
					
                  elseif ($product->get_regular_price()) {
					
                        $output .= '<span class="product-price">' . get_woocommerce_currency_symbol() . ' ' . $product->get_regular_price() . '</span>';
                    }
                    
					elseif ($product->get_sale_price()) {
					
                        $output .= '<span class="product-price">' . get_woocommerce_currency_symbol() . ' ' . $product->get_sale_price() . '</span>';
                    }
						$output .= '</div><!-- End .product-price-container -->';
                    $output .= '</li>';
                }
            }
				$output .= '</ul>';
            $output .= '</div>';
            return $output;
        }
        function mango_grid_list_products($atts)
        {
            extract(
                shortcode_atts(array(
                    'products_view_type' => '',
                    'columns' => 4,
                    'isotope_style' => false,
                    'products_scenario' => '2',
                    'items_per_page' => '12',
                    'order_by' => 'recent_products',
                    'order' => 'desc',
                    'product_categories' => '',
                    'selected_products' => ''
                ), $atts));
            if (!taxonomy_exists("product_cat")) {
                return;
            }
            if ($products_view_type != '') {
                if ($products_view_type == 'v_1' || $products_view_type == 'v_2' || $products_view_type == 'v_3' || $products_view_type == 'v_4') {
                    add_filter("mango_filter_shop_view", function ($args) {
                        return "grid";
                    });
                    if ($products_view_type == "v_1") {
                        add_filter("mango_filter_shop_grid_version", function ($args) {
                            return "v_1";
                        });
                    } elseif ($products_view_type == "v_2") {
                        add_filter("mango_filter_shop_grid_version", function ($args) {
                            return "v_2";
                        });
                    } elseif ($products_view_type == "v_3") {
                        add_filter("mango_filter_shop_grid_version", function ($args) {
                            return "v_3";
                        });
                    } elseif ($products_view_type == "v_4") {
                        if ($isotope_style) {
                            add_filter("mango_filter_product_container_id", function ($args) {
                                return "product-container";
                            });
                            add_filter("mango_shop_multiple_images", function ($arg) {
                                return false;
                            });
                            if ($columns == 6 || $columns == 5) {
                                add_filter("mango_filter_product_container_class", function ($args) {
                                    return "fullwidth";
                                });
                            } else {
                                add_filter("mango_filter_product_container_class", function ($args) {
                                    return "";
                                });
                            }
                        }
                        add_filter("mango_filter_shop_grid_version", function ($args) {
                            return "v_4";
                        });
                    }
                } elseif ($products_view_type == 'list' || $products_view_type == 'list_right') {
                    add_filter("mango_filter_shop_view", function ($args) {
                        return "list";
                    });
                    if ($products_view_type == 'list') {
                        add_filter("mango_filter_shop_list_version", function ($args) {
                            return "list";
                        });
                    } elseif ($products_view_type == 'list_right') {
                        add_filter("mango_filter_shop_list_version", function ($args) {
                            return "list_right";
                        });
                    }
                }
            }
            if ($products_scenario == '2') {
                if ($order_by == "top_rated_products") {
                    return do_shortcode('[top_rated_products per_page="' . $items_per_page . '" columns="' . $columns . '" order="' . $order . '" ]');
                } elseif ($order_by == 'best_selling_products') {
                    return do_shortcode('[best_selling_products per_page="' . $items_per_page . '" columns="' . $columns . '" ]');
                } elseif ($order_by == 'featured_products') {
                    return do_shortcode('[featured_products per_page="' . $items_per_page . '" columns="' . $columns . '" order="' . $order . '" ]');
                } elseif ($order_by == 'sale_products') {
                    return do_shortcode('[sale_products per_page="' . $items_per_page . '" columns="' . $columns . '" order="' . $order . '" ]');
                } elseif ($order_by == 'recent_products' || $order_by == 'rand') {
                    if ($order_by == 'rand') {
                        $order_ = 'rand';
                    } else {
                        $order_ = 'date';
                    }
                if ($product_categories == '') {
                        return do_shortcode('[recent_products order_by="' . $order_ . '"  per_page="' . $items_per_page . '" columns="' . $columns . '" order="' . $order . '" ]');
                } 
				else {
                        $r_args = array(
                            'post_type' => 'product',
                            'tax_query' => array(
                                array(
                                 'taxonomy' => 'product_cat',
                                 'terms' => explode(",", $product_categories),
                                ),
                            ),
                        'posts_per_page' => $items_per_page,
                        'post_status' => 'publish'
                        );
                        $r = new WP_Query($r_args);
                        $ids = '';
                        $space = '';
                        if ($r->have_posts()) {
                            while ($r->have_posts()) {
                                $r->the_post();
                                $ids .= $space . get_the_ID();
                                $space = ',';
                            }
                        }
                        return do_shortcode('[products ids="' . $ids . '"  per_page="' . $items_per_page . '" columns="' . $columns . '" order="' . $order . '" ]');
                    }
                }
            } else {
                return do_shortcode('[products ids="' . $selected_products . '" columns="' . $columns . '"  order="' . $order . '" ]');
            }
        }	
       
       
        function mango_pro_item_grid($atts) {
         extract(
         shortcode_atts(array(
		'show_pro' => '',
		'pro_cat' => '',
		'columns' => 12,
        ), $atts));

    $args = array('post_type' => 'product', 'showposts' =>$show_pro, 'product_cat' =>$pro_cat);
	
		$argsd = query_posts($args);
		$post = new WP_Query( $argsd );
?>
		<div id='product-container' class=" clearfix products" data-view="grid">
		<?php
		if (have_posts()) :
		
			while (have_posts()) : the_post();
				global $product, $woocommerce;
				$attachment_ids = $product->get_gallery_attachment_ids();

				?>
					<div class="cols-pass">
						<div class="product-top product col-md-<?php echo $columns; ?>">
							<div class="img-effect">
								<a href="<?php echo get_the_permalink()?>" title="<?php echo get_the_title();?>">
								 <?php echo get_the_post_thumbnail( $post->ID, 'shop-image', array("class" => "product-image prd-down") ).''; ?>
								 <span></span>
								 <i class="fa fa-search"></i>
								</a>
							</div>
						</div>
					</div>
				<?php
		    endwhile;
		    ?>
		</div>
		
		<?php
		endif;
	wp_reset_query();
        }
	
        /*
        Load plugin css and javascript files which you may need on front end of your site
        */
        public function loadCssAndJs()
        {
            wp_enqueue_script('custom', plugins_url('assets/custom.js', __FILE__), array('jquery'));
        }
    }
// Finally initialize code
    new VCExtendAddonClass();
    if (class_exists('WPBakeryShortCodesContainer')) {
        class WPBakeryShortCode_Mango_Bootstrap_Slider extends WPBakeryShortCodesContainer
        {
        }
    }
    if (class_exists('WPBakeryShortCode')) {
        class WPBakeryShortCode_Mango_Add_Bootstrap_Slider extends WPBakeryShortCode
        {
        }
    }
    if (class_exists('VCExtendAddonClass')) {
        function my_param_exploded_textarea_settings($settings, $value)
        {
            $dependency = vc_generate_dependencies_attributes($settings);
            return '<div class="my_param_block">'
            . '<textarea name="' . $settings['param_name'] . '" class="wpb_vc_param_value wpb-textarea values exploded_textarea'
            . $settings['param_name'] . '"' . $dependency . '>' . $value . '</textarea>'
            . '</div>';
        }
        vc_add_shortcode_param('my_exploded_textarea', 'my_param_exploded_textarea_settings');
        function mango_number($settings, $value)
        {
            $dependency = vc_generate_dependencies_attributes($settings);
            return '<div class="my_param_block">'
            . '<input name="' . $settings['param_name']
            . '" class="wpb_vc_param_value wpb-textinput '
            . $settings['param_name'] . ' ' . $settings['type'] . '_field" type="number" min="0" max="100" value="'
            . $value . '" ' . $dependency . '/>'
            . '</div>';
        }
        vc_add_shortcode_param('number', 'mango_number');
    }
} //Vc_Manager