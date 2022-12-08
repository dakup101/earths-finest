<div
    class="fixed bg-dark/20 top-0 left-0 w-screen h-screen z-50 backdrop-blur-sm text-dark  transition-all mobile-menu -translate-x-full">
    <div class="h-full max-w-xs shadow-lg bg-white p-5">
        <div class="flex items-center justify-between pb-5 mb-5 border-b border-gray">
            <a href="<?php echo get_home_url(); ?>">
                <img src="<?php echo THEME_IMG . 'logo.jpeg' ?>" alt="" class="h-12 site-logo">
            </a>
            <button class="w-7 h-7 close-mobile-menu">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-full" viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                </svg>
            </button>
        </div>
        <nav class="grid gap-3">
            <ul class="grid gap-5 font-bold list-none p-0">
                <?php
                $menu = wp_get_menu_array('primary');
                foreach($menu['menus'] as $el) :
                ?>
                <li class="mr-6 text-lg mid:mr-10">
                    <a href="<?php echo $el['url'] ?>" class="transition-all hover:text-rose font-alt text-brown">
                        <?php echo $el['title'] ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</div>