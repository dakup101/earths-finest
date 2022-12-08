<?php 
get_header();
global $post;
$banner = get_field('banner');
?>

<div class="relative bg-cover min-h-72 sm:min-h-screen bg-center flex items-center justify-center"
    style="background-image:url('<?php echo $banner ?>')">
    <div class="container mx-auto pb-16">
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="text-5xl sm:text-8xl text-white text-center font-semibold"><?php echo get_the_title() ?></h1>
        <?php endif; ?>
    </div>
    <img src="<?php echo THEME_IMG . 'wave-white-up.svg' ?>" alt="" class="w-full absolute -bottom-1 right-0">
</div>
<div class="container max-w-4xl mx-auto pt-10">
    <div class="mb-5">
        <?php the_content() ?>
    </div>
    <hr class="border border-accent/20">

    <div class="my-5 flex justify-between items-center">
        <span class="text-lg font-bold">SHARE ON SOCIAL</span>
        <?php
 if(function_exists('zm_sh_btn')){
	$options['iconset']		= 'flat';
	$options['iconset_type']	= 'circle';
	$options['class']			= 'in_php_function';
	$options['icons']			= array( 'facebook', 'twitter', 'linkedin', 'pinterest' );
	echo zm_sh_btn($options);
}
?>
    </div>
</div>
<div class="container mx-auto my-5">
    <h2 class="text-4xl text-center text-brown my-10">Discover More:</h2>
    <?php get_template_part( THEME_CMP, 'posts-slider' ) ?>
</div>
<?php get_template_part(THEME_CMP , 'about-section'); ?>
<?php get_footer(); ?>