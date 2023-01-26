<?php  
add_action('init', 'return_shipping_options_init');

function return_shipping_options_init() {
    add_action( 'wp_ajax_nopriv_fetch_shipping_methods', 'return_shippint_options' );
    add_action( 'wp_ajax_fetch_shipping_methods', 'return_shippint_options' );
}

function return_shippint_options() {
    $html = shipping_options_html();
    echo $html;
    wp_die();
}

function shipping_options_html(){
    ob_start();
    WC()->cart->calculate_totals(); 
    wc_cart_totals_shipping_html();
    return ob_get_clean();
}