<?php 
/* Template Name: Contact */
get_header(); 
global $post;
$banner = get_field('banner');
$title = $post->post_title;
$posts_counter = 0;
?>

<div class="relative bg-cover min-h-72 sm:min-h-screen bg-center flex items-center justify-center"" style="
    background-image:url('<?php echo $banner ?>')">
    <div class="container mx-auto pt-10 pb-10">
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="text-5xl sm:text-8xl text-white text-center font-semibold"><?php echo $title; ?></h1>
        <?php endif; ?>
    </div>
    <img src="<?php echo THEME_IMG . 'image-top.png' ?>" alt="" class="w-full absolute -bottom-1 sm:-bottom-32 right-0">
</div>
<section class="container mx-auto grid grid-cols-1 sm:grid-cols-2 gap-10 relative items-center">
    <div class="grid mt-5 sm:grid-cols-2 gap-5 items-start order-2 sm:order-1">
        <?php if (!empty(get_field('addresses'))): ?>
        <div>
            <h2 class="uppercase text-brown text-2xl mb-5">
                <?php echo get_field('addresses_title') ?>
            </h2>
            <?php foreach(get_field('addresses') as $el) : ?>
            <h3 class="text-sm font-sans mb-3 font-semibold">
                <?php echo $el['subtitle'] ?>
            </h3>
            <div class="mb-5 font-light">
                <?php echo $el['address'] ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <div>
            <?php if (!empty(get_field('phones'))): ?>
            <h2 class="uppercase text-brown text-2xl mb-5">
                <?php echo get_field('phones_title') ?>
            </h2>
            <?php foreach(get_field('phones') as $el) : ?>
            <h3 class="text-sm font-sans mb-3 font-semibold">
                <?php echo $el['subtitle'] ?>
            </h3>
            <a href="<?php echo "tel:" . $el['phone'] ?>" class="mb-5 block font-light hover:underline">
                <?php echo $el['phone'] ?>
            </a>
            <?php endforeach; ?>
            <?php endif; ?>
            <?php if (!empty(get_field('emails'))): ?>
            <h2 class="uppercase text-brown text-2xl mb-5">
                <?php echo get_field('emails_title') ?>
            </h2>
            <?php foreach(get_field('emails') as $el) : ?>
            <h3 class="text-sm font-sans mb-3 font-semibold">
                <?php echo $el['subtitle'] ?>
            </h3>
            <a href="<?php echo "mailto:" . $el['email'] ?>" class="mb-5 block font-light hover:underline">
                <?php echo $el['email'] ?>
            </a>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="sm:-translate-y-24 text-center order-1 sm:order-2">
        <div class="w-full">
            <h2 class="text-4xl text-brown mb-5">
                <?php echo get_field('form_title'); ?>
            </h2>
            <?php echo do_shortcode(get_field('contact_form_shortcode')) ?>
        </div>
    </div>
</section>
<section class="relative">
    <img src="<?php echo THEME_IMG . 'image-bottom.png' ?>" alt="" class="absolute w-full top:0 right-0">
    <?php echo get_field('map_iframe'); ?>
</section>
<?php get_footer('normal'); ?>