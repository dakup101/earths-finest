<?php
// Cookie lives for 7 days
// Add product_id to product cookie, recipe_id to recipes cookie
function record_product_id(){
    $cookie_name = null;
    $new_value = null;
    $post_id = url_to_postid( "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] );
    // Ignore if Admin Page
    if (is_admin()) return;
    // Set cookie name
    switch(get_post_type($post_id)){
        case "product":
            $cookie_name = "products_viewed";
            $terms = get_the_terms( $post_id, 'product_cat' );
            foreach ($terms as $term) {
                $new_value = $term->term_id;
                break;
            }
            break;
        case "recipe":
            $cookie_name = "recipes_viewed";
            $new_value = $post_id;
            break;
        default:
            $cookie_name = null;
            break;
    }

    // Ignore if not wanted post type ($cookie_name missing) or new value missing;
    if (!$cookie_name || !$new_value) return;

    if (!isset($_COOKIE[$cookie_name])){
        setcookie($cookie_name, $new_value, time() + (60 * 60 * 24 * 7), "/");
        return;
    }
    $buffered_products = $_COOKIE[$cookie_name];
    $buffered_products = explode(", ", $buffered_products);
    // Ignore if duplicate
    if (in_array($new_value, $buffered_products)){
        foreach($buffered_products as $key => $value){
            if ($new_value == $value){
                unset($buffered_products[$key]);
            }
        }
    }
    // Strip first el if more than 3
    if (count($buffered_products) >= 3) array_pop($buffered_products);
    // Set New Item
    array_unshift($buffered_products, $new_value);
    setcookie($cookie_name, implode(", ", $buffered_products), time() + (60 * 60 * 24 * 7), "/");
}
add_action("init", "record_product_id");
?>