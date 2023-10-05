<?php 
/* Template Name: Just Text */
get_header(); 
global $post;
$banner = get_field('banner');
$title = $post->post_title;
$posts_counter = 0;
?>
<main class="text-dark-light">
    <section class="bg-white py-10 mt-16 sm:mt-20">
        <div class="container mx-auto grid gap-4">
            <div class="just_text">
                <?php echo get_field('just_text') ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer('normal'); ?>