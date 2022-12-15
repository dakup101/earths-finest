<div
    class="absolute mega-menu top-full left-0 w-full p-5 bg-white shadow-xl pt-20 opacity-0 pointer-events-none transition-all translate-y-5">
    <div class="container mx-auto">
        <?php
                $args = array(
                    'taxonomy' => 'product_cat',
                    'orderby' => 'ASC',
                    'hide_empty' => false,
                );
                $catTerms = get_terms('product_cat', $args);
                ?>
        <div class="grid grid-cols-6 gap-10">
            <?php foreach($catTerms as $el) : ?>
            <div>
                <?php 
                    $name = $el->name;
                    $link = get_term_link( $el, 'product_cat' );
                    $thumbnail_id = get_woocommerce_term_meta( $el->term_id, 'thumbnail_id', true );
                    $image = wp_get_attachment_url( $thumbnail_id );
                    $rand = rand(1, 4);
                ?>
                <a href="<?php echo $link; ?>"
                    class="grid text-brown hover:text-dark cursor-pointer transition-all rounded-lg">
                    <figure class="relative text-white hover:text-brownish-light transition-all svg-bg">
                        <figure class="absolute top-1/2 left-1/2 w-full -translate-y-1/2 -translate-x-1/2 z-10">
                            <?php switch_shape($rand); ?>
                        </figure>
                        <div class="p-3">
                            <img src="<?php echo $image; ?>" alt="<?php echo $name ?>" class="relative z-20 drop-shadow"
                                loading="lazy">
                        </div>
                    </figure>
                    <span class="block w-full text-center font-alt text-xl pt-5">
                        <?php echo $name ?>
                    </span>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>