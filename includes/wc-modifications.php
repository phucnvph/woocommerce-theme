<?php
//remove hooked woocommerce_get_sidebar in action woocommerce_sidebar
// remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

//open div container class
function open_container_class() {
    echo '<div class="container owt-container">';
}

//open div row class
function open_row_class() {
    echo '<div class="row owt-row">';
}

//open div col-8 class
function open_col_8_class() {
    echo "<div class='col-sm-8'>";
}

//close div col-8 class
function close_col_8_class() {
    echo '</div>';
}

//open div col-4 class
function open_col_4_class() {
    echo "<div class='col-sm-4'>";
}

//close div col-4 class
function close_col_4_class() {
    echo '</div>';
}

//close div row class
function close_row_class() {
    echo '</div>';
}

//close div container class
function close_container_class() {
    echo '</div>';
}

//open div col-12 class
function open_col_12_class() {
    echo "<div class='col-sm-12'>";
}

//close div col-12 class
function close_col_12_class() {
    echo '</div>';
}

function load_template_layout() {
    if(is_shop()){
        add_action('woocommerce_before_main_content', 'open_container_class', 5);
        add_action('woocommerce_before_main_content', 'open_row_class', 6);

        add_action('woocommerce_before_main_content', 'open_col_8_class', 7);
        add_action('woocommerce_after_main_content', 'close_col_8_class', 15);

        add_action('woocommerce_sidebar', 'open_col_4_class', 5);
        add_action('woocommerce_sidebar', 'close_col_4_class', 15);

        add_action('woocommerce_sidebar', 'close_row_class', 16);
        add_action('woocommerce_sidebar', 'close_container_class', 17);
    } else {
        remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
        add_action('woocommerce_before_main_content', 'open_container_class', 5);
        add_action('woocommerce_before_main_content', 'open_row_class', 6);

        add_action('woocommerce_before_main_content', 'open_col_12_class', 7);
        add_action('woocommerce_after_main_content', 'close_col_12_class', 15);

        add_action('woocommerce_after_main_content', 'close_row_class', 40);
        add_action('woocommerce_after_main_content', 'close_container_class', 45);
    }
}
add_action('template_redirect', 'load_template_layout');

function toggle_page_title($val) {
    $val = false;
    return $val;
}
add_filter('woocommerce_show_page_title', 'toggle_page_title');
add_action('woocommerce_after_shop_loop_item', 'the_excerpt', 5);

// removing woocommerce_breadcrumb hook
// remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// removing woocommerce_result_count hook
// remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);