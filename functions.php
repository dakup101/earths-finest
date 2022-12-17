<?php
// Globals
define('THEME_DIR', trailingslashit(get_template_directory()));
define('THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));
define('THEME_FUN', THEME_DIR . 'functions/php-');
define('THEME_IMG', THEME_URI . 'assets/img/');
define('THEME_CMP','/components/ef');


// Theme settings
add_theme_support('automatic-feed-links');
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

add_filter('use_block_editor_for_post', '__return_false');
add_filter( 'wpcf7_autop_or_not', '__return_false' );
add_action( 'init', function() {
	remove_post_type_support( 'page', 'editor' );
}, 99);


function add_cond_to_where( $where ) {
  //Replace showings_$ with repeater_slug_$
  $where = str_replace("meta_key = 'cooked_with_cat_$", "meta_key LIKE 'cooked_with_cat_%", $where);
  return $where;
}

add_filter('posts_where', 'add_cond_to_where');

// Theme Functions
require THEME_FUN . 'theme-scripts.php';
require THEME_FUN . 'register-menus.php';
require THEME_FUN . 'menu-array.php';
require THEME_FUN . 'shapes-switch.php';


// Post Types
require THEME_FUN . 'recipe-post-type.php';

// Taxonomies
require THEME_FUN . 'meal-taxonomy.php';
require THEME_FUN . 'diet-taxonomy.php';
require THEME_FUN . 'ingridient-taxonomy.php';

// ACF Options page
require THEME_FUN . 'acf-options-page.php';

// Recipes AJAX
require THEME_FUN . 'html-recipes.php';
require THEME_FUN . 'return-html-recipes.php';

// Posts AJAX
require THEME_FUN . 'html-posts.php';
require THEME_FUN . 'return-html-posts.php';

// Recipes slider Ajax
require THEME_FUN . 'html-recipes-slider.php';
require THEME_FUN . 'return-html-recipes-slider.php';


add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

function time_ago( $type = 'post' ) {
  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';

  return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
}

function remove_add_to_cart_buttons() {
  if (is_product_category() || is_shop()) {
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
  }
}

add_action( 'woocommerce_checkout_order_review', 'reordering_checkout_order_review', 1 );
function reordering_checkout_order_review(){
    remove_action('woocommerce_checkout_order_review','woocommerce_checkout_payment', 20 );
}

function custom_checkout_payment() {
  $checkout = WC()->checkout();
  if ( WC()->cart->needs_payment() ) {
      $available_gateways = WC()->payment_gateways()->get_available_payment_gateways();
      WC()->payment_gateways()->set_current_gateway( $available_gateways );
  } else {
      $available_gateways = array();
  }
  ?>
<div id="payment" class="woocommerce-checkout-payment-gateways">
    <?php if ( WC()->cart->needs_payment() ) : ?>
    <ul class="wc_payment_methods payment_methods methods">
        <?php
              if ( ! empty( $available_gateways ) ) {
                  foreach ( $available_gateways as $gateway ) {
                      wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
                  }
              } else {
                  echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">';
                  echo apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
              }
              ?>
    </ul>
    <?php endif; ?>
</div>
<?php
}

function custom_checkout_place_order() {
  $checkout          = WC()->checkout();
  $order_button_text = apply_filters( 'woocommerce_order_button_text', __( 'Place order', 'woocommerce' ) );
  ?>
<div id="payment-place-order" class="woocommerce-checkout-place-order">
    <div class="form-row place-order">
        <noscript>
            <?php esc_html_e( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ); ?>
            <br /><button type="submit" class="ef-accent-alt-btn w-fit" name="woocommerce_checkout_update_totals"
                value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><span
                    class="block relative"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></span></button>
        </noscript>

        <?php wc_get_template( 'checkout/terms.php' ); ?>

        <?php do_action( 'woocommerce_review_order_before_submit' ); ?>

        <?php echo '<button type="submit" class="ef-accent-alt-btn w-full mt-5" name="woocommerce_checkout_place_order" id="place_order"><span class="block relative">Place Order</span></button>'; // @codingStandardsIgnoreLine ?>

        <?php do_action( 'woocommerce_review_order_after_submit' ); ?>

        <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
    </div>
</div>
<?php
  if ( ! is_ajax() ) {
      do_action( 'woocommerce_review_order_after_payment' );
  }
}

function disable_shipping_calc_on_cart( $show_shipping ) {
    if( is_cart() ) {
        return false;
    }
    return $show_shipping;
}
add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );

add_filter( 'wc_add_to_cart_message_html', 'my_wc_add_to_cart_message_html', 10, 2 );
function my_wc_add_to_cart_message_html( $message, $products ) {
    $titles = array();
    $count  = 0;

    foreach ( $products as $product_id => $qty ) {
        $titles[] = ( $qty > 1 ? absint( $qty ) . ' &times; ' : '' ) . sprintf( _x( '&ldquo;%s&rdquo;', 'Item name in quotes', 'woocommerce' ), strip_tags( get_the_title( $product_id ) ) );
        $count += $qty;
    }

    $titles     = array_filter( $titles );
    $added_text = sprintf( _n( '%s has been added to your cart.', '%s have been added to your cart.', $count, 'woocommerce' ), wc_format_list_of_items( $titles ) );

    // Output success messages - the "View cart" or "Continue shopping" link comes after the product link/info.
    if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
        $return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );
        $message   = sprintf( '%s <a href="%s" class="button wc-forward">%s</a>', esc_html( $added_text ), esc_url( $return_to ), esc_html__( 'Continue shopping', 'woocommerce' ) );
    } else {
        $message   = sprintf( '%s <a href="%s" class="button wc-forward">%s</a>', esc_html( $added_text ), esc_url( wc_get_page_permalink( 'cart' ) ), esc_html__( 'View cart', 'woocommerce' ) );
    }

    return $message;
}