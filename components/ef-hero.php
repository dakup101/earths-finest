<div class="relative mt-12">
    <picture class="w-full">
        <source media="(min-width: 568px)" srcset="<?php echo get_field("banner_desktop_img") ?>">
        <img src="<?php echo get_field("banner_mobile_img") ?>" alt="Earth's Finest" class="w-full">
    </picture>
    <div class="absolute w-full left-0 bottom-2 xs:bottom-14">
        <div class="w-11/12 xl: mx-auto flex">
            <?php
    $args = array(
        "post_type" => "product",
        "numberposts" => 6,
        "orderby" => "rand"
    );

    $products = get_field('product_highlights');
    ?>
            <div class="ef-hero swiper relative w-1/2 xs:w-1/5">
                <div class="swiper-wrapper">
                    <?php foreach($products as $el) : ?>
                    <div class="swiper-slide">
                        <a href="<?php echo $el['product_link']; ?>">
                            <img src="<?php echo $el['product_image']; ?>" alt="" loading="lazy">
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>


</div>