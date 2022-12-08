<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earth's Finest</title>
    <link rel="stylesheet" href="https://use.typekit.net/ahi5ene.css">
    <?php wp_head(); ?>
</head>

<body>
    <header
        class="fixed <?php echo is_admin_bar_showing() ? 'top-8' : 'top-0' ?> top-0 left-0 w-full bg-biege-dark z-50">
        <div class="relative">
            <div class="container mx-auto relative">
                <div class="relative py-4 lg:py-4 flex justify-between items-center lg:justify-end">
                    <button class="open-mobile-menu block md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor" class="bi bi-list"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </button>
                    <a href="<?php echo get_home_url(); ?>"
                        class="absolute z-20 block top-0 left-1/2 -translate-x-1/2 md:translate-x-0 md:left-0 p-2 md:p-2 rounded-b-lg shadow-lg bg-white w-36 xs:w-44 md:w-48">
                        <img src="<?php echo THEME_IMG . 'logo.jpeg' ?>" alt="Earth's Finest" class="w-full h-auto"
                            loading="lazy">
                    </a>
                    <nav class="pl-52 pr-32 w-full hidden md:block">
                        <ul class="flex justify-end list-none p-0">
                            <?php foreach(wp_get_menu_array('primary')['menus'] as $el) :  ?>
                            <li class="ml-10 text-xl text-brown relative flex items-center">
                                <?php if ($el['title'] != "Products"): ?>
                                <a href="<?php echo $el['url']?>" class="hover:text-dark transition-all font-alt">
                                    <?php echo $el['title'] ?>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo $el['url']?>"
                                    class="hover:text-dark transition-all font-alt mega-menu-trigger flex items-center">
                                    <span class=" leading-none block">
                                        <?php echo $el['title'] ?>
                                    </span>
                                    <svg viewBox="0 0 700 700" fill="none" xmlns="http://www.w3.org/2000/svg"
                                        class="fill-current w-2.5 h-2.5 rotate-90 mb-1 ml-2">
                                        <path
                                            d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z">
                                    </svg>
                                </a>
                                <?php endif;?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                    <?php
                    $link_url = wc_get_cart_url();
    
                    // Text
                    $link_text = sprintf( __( '%d', 'woocommerce' ), WC()->cart->cart_contents_count);
                    
                    // Link
                    ?>
                    <a href="<?php echo $link_url; ?>" class="relative mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-6 h-6">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <div
                            class="absolute w-4 h-4 flex items-center justify-center -top-2 -right-2 bg-brown-light text-xs rounded-full text-white">
                            <?php echo $link_text ?>
                        </div>
                    </a>
                </div>
            </div>
            <?php get_template_part( THEME_CMP, 'megamenu' ) ?>
        </div>
    </header>