<section class="ef-about text-white relative pt-72 sm:pt-52"
    style="background-image: url('<?php echo get_field('pre-footer_background', 'options') ?>')">
    <div class="absolute top-0 left-0 w-full h-full">
    </div>
    <div class="container mx-auto relative z-10">
        <h2 class="text-5xl sm:text-6xl lg:text-8xl text-center mb-10">
            <?php echo get_field('pre-footer_title', 'options') ?>
        </h2>
        <div class="sm:px-44 text-normal font-light lg:text-xl text-center leading-loose lg:leading-normal">
            <?php echo get_field('pre-footer_text', 'options'); ?>
        </div>
        <a href="<?php echo get_field('pre-footer_button_link', 'options') ?>" class="ef-white-btn mx-auto mt-20">
            <span class="relative z-10">
                <?php echo get_field('pre-footer_button_text', 'options') ?>
            </span>
        </a>
    </div>
    <?php get_template_part(THEME_CMP , 'newsletter')  ?>
</section>