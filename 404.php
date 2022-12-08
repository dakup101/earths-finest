<?php /* Template Name: 404 page */ ?>
<?php get_header(); ?>
<div class="container flex flex-col justify-center items-center min-h-screen mx-auto">
    <h1 class="text-2xl sm:text-4xl font-alt text-brown mb-2 text-center">
        404: Not Found
    </h1>
    <p class="text-lg sm:text-xl text-center">
        Page You are looking for is not found. <a href="<?php echo get_home_url(); ?>" class="underline">Return to
            Homepage</a>
    </p>
</div>
<?php get_footer(); ?>