<?php
if(class_exists('Woocommerce')) {
    require_once 'includes/wc-modifications.php';
}
// Attach/Add asset file 
function simple_theme_load_scripts() {
    //add file style
    wp_enqueue_style('blog-home', get_template_directory_uri() . '/assets/css/styles.css', array(), '1.0', 'all');
    wp_enqueue_style('style', get_stylesheet_uri() , array(), '1.0', 'all');

    //add file script
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/scripts.js', array(), '1.0', 'all');

}

add_action('wp_enqueue_scripts', 'simple_theme_load_scripts');


//Register Nav
function simple_theme_nav_config() {
    register_nav_menus(
        array(
            'sbt_primary_menu_id' => 'SBT Primary Menu(Top Menu)',
            'sbt_secondary_menu_id' => 'SBT Sidebar Menu',
        )
    );

    //register theme support
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce', array(
        'thumbnail_image_width' => 150,
        'single_image_width' => 200,
        'product_grid' => array(
            'default_columns' => 1,
            'min_columns' => 5,
            'max_columns' => 6,
        ),
    ));

    $defaults = array(
        'height'               => 90,
        'width'                => 90,
        'flex-height'          => true,
        'flex-width'           => true,
        'unlink-homepage-logo' => true, 
    );
    add_theme_support( 'custom-logo', $defaults );

    // product image
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'simple_theme_nav_config');
 

//adding li class
function simple_theme_add_li_class($classes, $item, $args) {
    $classes[] = 'nav-item';
    return $classes;
}
add_filter('nav_menu_css_class', 'simple_theme_add_li_class', 1, 3);

//adding anchor links class
function simple_theme_add_anchor_links_class($classes, $item, $args) {
    $classes['class'] = 'nav-link sbt-link-class';
    return $classes;
}
add_filter('nav_menu_link_attributes', 'simple_theme_add_anchor_links_class', 1, 3);

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_simple_add_to_cart_fragment' );

function woocommerce_header_simple_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	$fragments['span.items-count'] = ob_get_clean();
	return $fragments;
}