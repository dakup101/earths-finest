<div class="swiper-slide p-2">
    <?php 
    $el = get_term(wp_parse_args( $args, null )["term_id"]);
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