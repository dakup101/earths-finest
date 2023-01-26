<?php get_header(); ?>

<?php 
$banner = get_field('recipes_archive_banner', 'options');
$title = get_field('recipes_archive_title', 'options');
$posts_counter = 0;
?>
<main class="text-dark-light">

    <div class="relative bg-cover h-72 sm:h-screen mt-5 bg-center flex items-center justify-center"
        style="background-image:url('<?php echo $banner ?>')">
        <div class="container mx-auto pb-16">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
            <h1 class="text-5xl sm:text-8xl text-white text-center font-semibold"><?php echo $title ?></h1>
            <?php endif; ?>
        </div>
        <img src="<?php echo THEME_IMG . 'wave-white-up.svg' ?>" alt="" class="w-full absolute -bottom-1 right-0">
    </div>
    <div class="container mx-auto grid sm:grid-cols-7 gap-10 sm:gap-20 py-10">
        <section class="sm:col-span-5  order-2 sm:order-1 recipes-archive-content">
            <div class="grid sm:grid-cols-2 gap-10">
                <?php while(have_posts()) : the_post(); ?>
                <?php $posts_counter == 0 ? get_template_part(THEME_CMP, 'archive-recipe-first-item') : get_template_part(THEME_CMP, 'archive-recipe-item'); ?>
                <?php $posts_counter++; endwhile; ?>
            </div>
            <div class="ef-pagination">
                <?php the_posts_pagination(array(
                "show_all" => true,
            )); ?>
            </div>
        </section>
        <section class="sm:col-span-2 order-1 sm:order-2">
            <?php get_template_part( THEME_CMP, 'archive-recipe-filters' ) ?>
        </section>

    </div>
</main>
<?php get_template_part(THEME_CMP , 'about-section'); ?>
<?php get_footer(); ?>