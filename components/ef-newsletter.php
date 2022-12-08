<div
    class="py-5 sm:py-14 px-10 lg:px-16 xl:px-32 rounded-3xl shadow-md bg-white absolute z-20 bottom-0 left-1/2 container translate-y-1/2 -translate-x-1/2">
    <div class="grid sm:grid-cols-2 gap-5 sm:gap-10 items-center">
        <div>
            <h2 class="text-2xl mb-3 sm:text-3xl xl:text-5xl text-brown-light font-semibold">
                <?php echo get_field('newsletter_title', 'options'); ?>
            </h2>
            <p class="text-dark-light font-light text-lg sm:text-lg lg:text-xl">
                <?php echo get_field('newsletter_subtitle', 'options'); ?>
            </p>

        </div>
        <div>
            <?php echo do_shortcode(get_field('newsletter_form_shortcode', 'options')) ?>
        </div>
    </div>
</div>