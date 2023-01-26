<?php 
/* Template Name: FAQ */
get_header(); 
global $post;
$banner = get_field('banner');
$title = $post->post_title;
$posts_counter = 0;
?>
<main class="text-dark-light">
    <div class="relative bg-cover h-72 sm:h-screen mt-5 bg-center flex items-center justify-center"" style="
        background-image:url('<?php echo $banner ?>')">
        <div class="container mx-auto">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
            <h1 class="text-5xl sm:text-8xl text-white text-center font-semibold"><?php echo $title; ?></h1>
            <?php endif; ?>
        </div>
        <img src="<?php echo THEME_IMG . 'wave-white-up.svg' ?>" alt="" class="w-full absolute -bottom-1 right-0">
    </div>
    <section class="container mx-auto sm:px-20 md:px-32 xl:px-56 mt-3">
        <?php if (!empty(get_field('accordions'))) : ?>
        <div class="grid gap-5 sm:gap-10 mb-10">
            <?php foreach(get_field('accordions') as $el) : ?>
            <div class="accordion-item">
                <div
                    class="accordion-trigger font-alt leading-normal cursor-pointer text-2xl flex items-start text-brown font-semibold">
                    <div class="bg-brownish p-1 w-fit rounded-full mr-5 mt-2">
                        <svg viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg"
                            class="w-3 sm:w-4 fill-white drop-shadow-xl rotate-90">
                            <path
                                d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z" />
                        </svg>
                    </div>
                    <?php echo $el['accordion_name']?>

                </div>
                <div class="accordion-content overflow-hidden transition-all text-lg text-dark-light">
                    <?php echo $el['accordion_content'] ?>
                </div>
            </div>

            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </section>
</main>
<?php get_footer('normal'); ?>