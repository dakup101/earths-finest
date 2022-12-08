<?php
defined( 'ABSPATH' ) || exit;

global $product;
?>

<div class="container mx-auto mt-24">
    <?php do_action( 'woocommerce_before_single_product' ); ?>
</div>
<div class="container mx-auto">
    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'mt-5', $product ); ?>>
        <div class="grid sm:grid-cols-2">
            <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
            <div class="summary entry-summary">
                <?php do_action( 'woocommerce_single_product_summary' ); ?>
            </div>
        </div>
    </div>
</div>

<div class="container mx-auto py-10 border-t border-b border-brown/20">
    <div class="text-4xl font-light text-center font-alt text-brown mb-5">You may also like:</div>

    <?php
    if( ! is_a( $product, 'WC_Product' ) ){
        $product = wc_get_product(get_the_id());
    }
    ?>
    <div class="rel-prods">
        <?php
        woocommerce_related_products( array(
            'posts_per_page' => 4,
            'columns'        => 4,
            'orderby'        => 'rand'
        ) );
        ?>
    </div>
</div>

<div class="container mx-auto py-10">
    <div class="text-4xl font-light text-center font-alt text-brown mb-10">Featured Recipes:</div>
    <?php get_template_part(THEME_CMP, 'recipes-slider' ); ?>
    <a href="/recipes" class="ef-accent-btn mx-auto mt-20">
        <span class="relative z-10">See all Recipes</span>
    </a>
</div>

<?php get_template_part(THEME_CMP , 'about-section'); ?>