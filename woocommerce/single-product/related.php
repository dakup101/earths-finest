<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$cookie_count = false;
$cookie_1 = null;
$cookie_2 = null;
$cookie_3 = null;
$cats_ids_array = array();
$cookie_saved = explode(", ", $_COOKIE["products_viewed"]);
switch(count($cookie_saved)){
    case 1: {
        $cookie_1 = $cookie_saved[0];
        $cookie_2 = null;
        $cookie_3 = null;
        break;
    }
    case 2: {
        $cookie_1 = $cookie_saved[0];
        $cookie_2 = $cookie_saved[1];
        $cookie_3 = null;
        break;
    }
    case 3: {
        $cookie_1 = $cookie_saved[0];
        $cookie_2 = $cookie_saved[1];
        $cookie_3 = $cookie_saved[2];
        break;
    }
    default: {
        $cookie_1 = null;
        $cookie_2 = null;
        $cookie_3 = null;
        break;
    }
}

$args = array(
	"post_type" => "product", 
	'posts_per_page' => 8,
	'orderby'        => 'rand',
);

$args_1 = array();

$args_2 = array();

$args_3 = array();


$product_ids = array();

if ($cookie_1 && !$cookie_2 && !$cookie_3){
	$args = array(
		"post_type" => "product", 
		'posts_per_page' => 6,
		'orderby'        => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => $cookie_1,
				'operator' => "NOT IN",
			),
		)
	);

	$args_1 = array(
		"post_type" => "product", 
		'posts_per_page' => 2,
		'orderby'        => 'rand',
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => $cookie_1,
			),
		)
		);
}
else if ($cookie_1 && $cookie_2 && !$cookie_3){
	$args = array(
		"post_type" => "product", 
		'posts_per_page' => 4,
		'orderby'        => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => array($cookie_1, $cookie_2),
				'operator' => "NOT IN",
			),
		)
	);

	$args_1 = array(
		"post_type" => "product", 
		'posts_per_page' => 2,
		'orderby'        => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => $cookie_1,
			),
		)
		);

	$args_2 = array(
		"post_type" => "product", 
		'posts_per_page' => 2,
		'orderby'        => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => $cookie_2,
			),
		)
		);
}
else if ($cookie_1 && $cookie_2 && $cookie_3){
	$args = array(
		"post_type" => "product", 
		'posts_per_page' => 2,
		'orderby'        => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => array($cookie_1, $cookie_2, $cookie_3),
				'operator' => "NOT IN",
			),
		)
	);

	$args_1 = array(
		"post_type" => "product", 
		'posts_per_page' => 2,
		'orderby'        => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => $cookie_1,
			),
		)
		);

	$args_2 = array(
		"post_type" => "product", 
		'posts_per_page' => 2,
		'orderby'        => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => $cookie_2,
			),
		)
		);

	$args_2 = array(
		"post_type" => "product", 
		'posts_per_page' => 2,
		'orderby'        => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field' => 'id',
				'terms' => $cookie_3,
			),
		)
		);
}
?>
<div class="ef-products-slider overflow-hidden relative px-14">
    <div class="slide-prev slide-nav text-brown transition-all left-0 h-full bg-white flex items-center">
        <svg viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg"
            class="w-8 sm:w-10 xl:w-14 fill-current drop-shadow-xl rotate-180 opacity-70 hover:opacity-100 cursor-pointer transition-all">
            <path
                d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z" />
        </svg>
    </div>
    <div class="swiper-wrapper">
        <!-- START - Recs 1 -->
        <?php if (!empty($args_1)): ?>
        <?php $products = new WP_Query($args_1);
		if ($products->have_posts()): ?>

        <?php while($products->have_posts()): $products->the_post(); ?>
        <ul class="swiper-slide p-2 list-none">
            <?php wc_get_template_part('content', 'product'); ?>
        </ul>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); endif; ?>
        <?php endif; ?>
        <!-- END - Recs 1 -->
        <!-- START - Recs 2 -->
        <?php if (!empty($args_2)): ?>
        <?php $products = new WP_Query($args_2);
		if ($products->have_posts()): ?>

        <?php while($products->have_posts()): $products->the_post(); ?>
        <ul class="swiper-slide p-2 list-none">
            <?php wc_get_template_part('content', 'product'); ?>
        </ul>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); endif; ?>
        <?php endif; ?>
        <!-- END - Recs 2 -->
        <!-- START - Recs 3 -->
        <?php if (!empty($args_3)): ?>
        <?php $products = new WP_Query($args_3);
		if ($products->have_posts()): ?>

        <?php while($products->have_posts()): $products->the_post(); ?>
        <ul class="swiper-slide p-2 list-none">
            <?php wc_get_template_part('content', 'product'); ?>
        </ul>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); endif; ?>
        <?php endif; ?>
        <!-- END - Recs 3 -->
        <?php $products = new WP_Query($args);
		if ($products->have_posts()): ?>

        <?php while($products->have_posts()): $products->the_post(); ?>
        <ul class="swiper-slide p-2 list-none">
            <?php wc_get_template_part('content', 'product'); ?>
        </ul>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); endif; ?>

    </div>
    <div class="slide-next slide-nav text-brown transition-all right-0 h-full bg-white flex items-center">
        <svg viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg"
            class="w-8 sm:w-10 xl:w-14 fill-current drop-shadow-xl opacity-70 hover:opacity-100 cursor-pointer transition-all">
            <path
                d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z" />
        </svg>
    </div>
</div>
<?php
wp_reset_postdata();