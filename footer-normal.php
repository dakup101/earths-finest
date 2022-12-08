<footer class="bg-biege-dark pt-10 pb-10">
    <div class="container mx-auto grid grid-cols-12">
        <div class="col-span-12 text-center sm:col-span-4 px-5 sm:px-0 pt-5 sm:pt-5">
            <img src="<?php echo THEME_IMG . 'logo-new.png' ?>" alt="" class="w-full mx-auto sm:mx-0"
                style="max-width: 200px">
        </div>
        <div class="col-span-6 sm:col-span-2 mt-10">
            <nav class="w-full">
                <ul class="grid gap-2 list-none p-0 font-alt">
                    <?php foreach(wp_get_menu_array('footer_1')['menus'] as $el) :  ?>
                    <li class="ml-10 text-lg text-brown">
                        <a href="<?php echo $el['url']?>"
                            class="hover:text-dark transition-all font-alt font-semibold text-2xl">
                            <?php echo $el['title'] ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
        <div class="col-span-6 sm:col-span-2 mt-10">
            <nav class="w-full">
                <ul class="grid gap-2 list-none p-0 font-alt">
                    <?php foreach(wp_get_menu_array('footer_2')['menus'] as $el) :  ?>
                    <li class="ml-10 text-lg text-brown">
                        <a href="<?php echo $el['url']?>"
                            class="hover:text-dark transition-all font-alt font-semibold text-2xl">
                            <?php echo $el['title'] ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
        <div class="col-span-12 sm:col-span-4 mt-10">
            <div class="flex justify-center sm:justify-end">
                <a href="<?php echo get_field('global_scoial_fb', 'options') ?>"
                    class="raltive w-10 h-10 p-3 bg-brown-light text-white hover:bg-white hover:text-brown-light transition-all rounded-full ml-5 block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-current" viewBox="0 0 24 24">
                        <path
                            d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                    </svg>
                </a>
                <a href="<?php echo get_field('global_scoial_ig', 'options') ?>"
                    class="raltive w-10 h-10 p-3 bg-brown-light text-white hover:bg-white hover:text-brown-light transition-all rounded-full block ml-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-current" viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-10 text-center text-dark/50">
        <?php echo get_field('page_copyright', 'options') ?>
    </div>
    <div
        class="back-to-top opacity-0 pointer-events-none fixed bottom-8 right-8 w-8 h-8 border-2 border-dark rounded-full cursor-pointer flex items-center justify-center hover:border-brown hover:text-white hover:bg-brownish transition-all">
        <svg viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg" class="fill-current w-4 h-4 -rotate-90">
            <path
                d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z" />
        </svg>
    </div>
    <?php get_template_part( THEME_CMP, 'mobile-menu' ) ?>
    <script type="text/javascript"
        src="<?php echo get_template_directory_uri(); ?>/assets/cookies/divante.cookies.min.js">
    </script>
    <script>
    window.jQuery.cookie || document.write(
        '<script src="<?php echo get_template_directory_uri(); ?>/assets/cookies/jquery.cookie.min.js"><\/script>')
    </script>
    <script>
    jQuery(function($) {
        $.divanteCookies.render({
            privacyPolicy: true,
        });
    });
    </script> <?php wp_footer() ?>
</footer>
</body>

</html>