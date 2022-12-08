<?php
add_action('init', 'return_html_recipes_slider_init');

function return_html_recipes_slider_init() {
    add_action( 'wp_ajax_nopriv_fetch_recipes_slider', 'return_html_recipes_slider' );
    add_action( 'wp_ajax_fetch_recipes_slider', 'return_html_recipes_slider' );
}

function return_html_recipes_slider() {
    $html = recipes_slider_html();
    echo $html;
    wp_die();
}