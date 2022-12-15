<?php
$args = array(
    'taxonomy' => 'product_cat',
    'orderby' => 'ASC',
    'hide_empty' => false,
);
$catTerms = get_terms('product_cat', $args);
?>

<div class="ef-cats-slider overflow-hidden relative px-12 sm:px-16 xl:px-20">
    <div class="slide-prev slide-nav text-brown transition-all left-0 h-full bg-biege flex items-center">
        <svg viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg"
            class="w-8 sm:w-10 xl:w-14 fill-current drop-shadow-xl rotate-180 opacity-70 hover:opacity-100 cursor-pointer transition-all">
            <path
                d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z" />
        </svg>
    </div>
    <div class="swiper-wrapper">
        <?php foreach($catTerms as $el) :  ?>
        <div class="swiper-slide p-2">
            <?php 
            $name = $el->name;
            $link = get_term_link( $el, 'product_cat' );
            $thumbnail_id = get_woocommerce_term_meta( $el->term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );
            $rand = rand(1, 4);
            ?>
            <a href="<?php echo $link; ?>"
                class="grid text-brown hover:text-dark cursor-pointer transition-all rounded-lg">
                <figure class="relative text-brownish-light hover:text-white transition-all svg-bg">
                    <figure class="absolute top-1/2 left-1/2 w-full -translate-y-1/2 -translate-x-1/2 z-10">
                        <?php switch_shape($rand); ?>
                    </figure>
                    <div class="mb-4">
                        <img src="<?php echo $image; ?>" alt="<?php echo $name ?>" class="relative z-20 drop-shadow">
                    </div>
                </figure>
                <span class="block w-full text-center uppercase font-alt font-semibold text-lg lg:text-xl px-5 pb-5">
                    <?php echo $name ?>
                </span>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="slide-next slide-nav text-brown transition-all right-0 h-full bg-biege flex items-center">
        <svg viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg"
            class="w-8 sm:w-10 xl:w-14 fill-current drop-shadow-xl opacity-70 hover:opacity-100 cursor-pointer transition-all">
            <path
                d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z" />
        </svg>
    </div>
</div>