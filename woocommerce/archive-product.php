<?php
defined( 'ABSPATH' ) || exit;
get_header();
global $post;
$thisView = get_queried_object();

$banner = null;
$desc = null;
$desc_long = null;
$desc_long_img = null;
$desc_usage = null;

$shopId = woocommerce_get_page_id('shop');


$isCat = is_product_category();
if ($isCat) {
	$banner = get_field('banner', $thisView);
	$desc = get_field('desc', $thisView);
	$desc_long_img = get_field('desc_long_img', $thisView);
	$desc_long = get_field('desc_long', $thisView);
	$desc_usage = get_field('desc_usage', $thisView);
} else {
	$banner = get_field('banner', $shopId);
	$desc = get_field('desc', $shopId);
}
?>
<main class="text-dark-light">
    <div class="relative bg-cover h-72 sm:h-screen mt-5 bg-center flex items-center justify-center"
        style="background-image:url('<?php echo $banner ?>')">
        <div class="container mx-auto pb-16">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
            <h1 class="text-5xl sm:text-8xl text-white text-center font-semibold"><?php woocommerce_page_title(); ?>
            </h1>
            <?php endif; ?>
        </div>
        <img src="<?php echo THEME_IMG . 'wave-white-up.svg' ?>" alt=""
            class="w-full absolute -bottom-1 right-0 -scale-x-100">
    </div>
    <div class="container mx-auto">
        <?php if ($isCat): ?>
        <div
            class="text-center text-dark-light font-light mx-auto mb-14 pt-3 max-w-2xl leading-relaxed md:-translate-y-16">
            <?php echo $desc ?>
        </div>

        <?php else: ?>
        <div
            class="text-center text-dark-light font-light mx-auto mb-14 pt-3 max-w-2xl md:float-right md:-translate-y-20 xl:-translate-y-32 leading-relaxed">
            <?php echo $desc ?>
        </div>

        <?php endif; ?>

    </div>
    <div class="container mx-auto flex md:-translate-y-16 xl:-translate-y-20">
        <?php
	if ( woocommerce_product_loop() ) {
		woocommerce_product_loop_start();
	
		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();
				do_action( 'woocommerce_shop_loop' );
				wc_get_template_part( 'content', 'product' );
			}
		}
		woocommerce_product_loop_end();
	} else {
		do_action( 'woocommerce_no_products_found' );
	}
	?>
    </div>
</main>
<?php if ($isCat) { get_template_part(THEME_CMP, 'cat-desc', array(
	"desc" => $desc_long,
	"img" => $desc_long_img,
	"usage" => $desc_usage
)); 
get_footer("normal");
} else { get_template_part(THEME_CMP , 'about-section'); 
	get_footer();
} ?>