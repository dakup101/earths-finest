<?php 
/* Template Name: About */
get_header(); 
global $post;
$banner = get_field('banner');
$title = $post->post_title;
$posts_counter = 0;
?>

<div class="relative bg-cover min-h-72 sm:min-h-screen bg-center flex items-center justify-center" style="
    background-image:url('<?php echo $banner ?>')">
    <div class="container mx-auto pt-48 pb-32">
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="text-5xl sm:text-8xl text-white text-center font-semibold"><?php echo $title; ?></h1>
        <?php endif; ?>
    </div>
    <img src="<?php echo THEME_IMG . 'biege-wave-up.svg' ?>" alt="" class="w-full absolute -bottom-1 right-0">
</div>
<section class="bg-biege-dark pt-5 <?php if (empty(get_field('team'))) echo 'pb-10'; ?>">
    <div class="container mx-auto grid gap-4">
        <div>
            <?php echo get_field('about_text_1') ?>
        </div>
        <div>
            <?php echo get_field('about_text_2') ?>
        </div>
    </div>
</section>
<?php if (!empty(get_field('team'))) : ?>
<img src="<?php echo THEME_IMG . 'biege-wave-down.svg' ?>" alt="" class="w-full relative -top-1 right-0">
<section class="container mx-auto">
    <h2 class="text-4xl text-brown text-center my-5">
        <?php echo get_field('team_tilte'); ?>
    </h2>
    <div class=" max-w-4xl text-center mx-auto mb-16">
        <?php echo get_field('team_text') ?>
    </div>
    </div>
    <div class="grid xs:grid-cols-2 sm:grid-cols-3 gap-10 my-10">
        <?php foreach(get_field('team') as $el) : ?>
        <article class="flex flex-col items-center">
            <header class="w-52 aspect-square rounded-full overflow-hidden relative">
                <img src="<?php echo $el['img'] ?>" alt=""
                    class="w-full h-full object-cover absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
            </header>
            <main>
                <h3 class="text-2xl text-brown-light mt-5 mb-3">
                    <?php echo $el['name']; ?>
                </h3>
                <span class="text-xl text-brown font-alt text-center block">
                    <?php echo $el['Position']; ?>
                </span>
            </main>
        </article>
        <?php endforeach; ?>
    </div>
</section>
<?php else: ?>
<hr>
<?php endif; ?>
<?php get_footer('normal'); ?>