<?php  
add_action('init', 'return_html_posts_init');

function return_html_posts_init() {
    add_action( 'wp_ajax_nopriv_fetch_posts', 'return_html_posts' );
    add_action( 'wp_ajax_fetch_posts', 'return_html_posts' );
}

function return_html_posts() {
    $html = posts_html();
    echo $html;
    wp_die();
}