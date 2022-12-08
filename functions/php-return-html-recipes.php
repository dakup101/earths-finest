<?php
add_action('init', 'return_html_recipes_init');

function return_html_recipes_init() {
    add_action( 'wp_ajax_nopriv_fetch_recipes', 'return_html_recipes' );
    add_action( 'wp_ajax_fetch_recipes', 'return_html_recipes' );
}

function return_html_recipes() {
    $html = recipes_html();
    echo $html;
    wp_die();
}