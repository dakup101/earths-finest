<?php
$args = array();
$catTerms = null;
$cookie_count = false;
$cookie_1 = null;
$cookie_2 = null;
$cookie_3 = null;
$args = array(
    'taxonomy' => 'product_cat',
    'orderby' => 'ASC',
    'hide_empty' => false,
);
$catTerms = get_terms('product_cat', $args);

$cookie_saved = explode(", ", $_COOKIE["products_viewed"]);
switch(count($cookie_saved)){
    case 1: {
        $cookie_1 = $cookie_saved[0];
        $cookie_2 = null;
        $cookie_3 = null;
        break;
    }
    case 2: {
        $cookie_1 = $cookie_saved[0];
        $cookie_2 = $cookie_saved[1];
        $cookie_3 = null;
        break;
    }
    case 3: {
        $cookie_1 = $cookie_saved[0];
        $cookie_2 = $cookie_saved[1];
        $cookie_3 = $cookie_saved[2];
        break;
    }
    default: {
        $cookie_1 = null;
        $cookie_2 = null;
        $cookie_3 = null;
        break;
    }
}
?>

<div class="ef-cats-slider overflow-hidden relative px-12 sm:px-16 xl:px-20">
    <div class="slide-prev slide-nav text-brown transition-all left-0 h-full bg-biege flex items-center">
        <svg viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg"
            class="w-8 sm:w-10 xl:w-14 fill-current drop-shadow-xl rotate-180 opacity-70 hover:opacity-100 cursor-pointer transition-all">
            <path
                d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z" />
        </svg>
    </div>

    <?php if (!$cookie_1 && !$cookie_2 && !$cookie_3): ?>
    <div class="swiper-wrapper">
        <?php foreach($catTerms as $el) :  ?>
        <?php get_template_part(THEME_CMP, "product-cat-slider-item", $el) ?>
        <?php endforeach; ?>
    </div>
    <?php elseif ($cookie_1 && !$cookie_2 && !$cookie_3): ?>
    <div class="swiper-wrapper">
        <?php
            $terms_1 = array(get_term_by("id", $cookie_1, "product_cat"));
        ?>
        <?php foreach($terms_1 as $el) :  ?>
        <?php get_template_part(THEME_CMP, "product-cat-slider-item", $el) ?>
        <?php endforeach; ?>
        <?php foreach($catTerms as $el) :  ?>
        <?php foreach($terms_1 as $el_1) : ?>
        <?php if ($el != $el_1) : ?>
        <?php get_template_part(THEME_CMP, "product-cat-slider-item", $el) ?>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
    <?php elseif ($cookie_1 && $cookie_2 && !$cookie_3): ?>
    <div class="swiper-wrapper">
        <?php
            $terms_1 = array(get_term_by("id", $cookie_1, "product_cat"));
            $terms_2 = array(get_term_by("id", $cookie_2, "product_cat"));
            ?>
        <?php foreach($terms_1 as $el) :  ?>
        <?php get_template_part(THEME_CMP, "product-cat-slider-item", $el) ?>
        <?php endforeach; ?>
        <?php foreach($terms_2 as $el) :  ?>
        <?php get_template_part(THEME_CMP, "product-cat-slider-item", $el) ?>
        <?php endforeach; ?>
        <?php foreach($catTerms as $el) :  ?>
        <?php foreach($terms_1 as $el_1) : ?>
        <?php if ($el != $el_1) : ?>
        <?php foreach($terms_2 as $el_2) : ?>
        <?php if ($el != $el_2) : ?>
        <?php get_template_part(THEME_CMP, "product-cat-slider-item", $el) ?>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
    <?php elseif ($cookie_1 && $cookie_2 && $cookie_3): ?>
    <div class="swiper-wrapper">
        <?php
            $terms_1 = array(get_term_by("id", $cookie_1, "product_cat"));
            $terms_2 = array(get_term_by("id", $cookie_2, "product_cat"));
            $terms_3 = array(get_term_by("id", $cookie_3, "product_cat"));
            ?>
        <?php foreach($terms_1 as $el) :  ?>
        <?php get_template_part(THEME_CMP, "product-cat-slider-item", $el) ?>
        <?php endforeach; ?>
        <?php foreach($terms_2 as $el) :  ?>
        <?php get_template_part(THEME_CMP, "product-cat-slider-item", $el) ?>
        <?php endforeach; ?>
        <?php foreach($terms_3 as $el) :  ?>
        <?php get_template_part(THEME_CMP, "product-cat-slider-item", $el) ?>
        <?php endforeach; ?>
        <?php foreach($catTerms as $el) :  ?>
        <?php foreach($terms_1 as $el_1) : ?>
        <?php if ($el != $el_1) : ?>
        <?php foreach($terms_2 as $el_2) : ?>
        <?php if ($el != $el_2) : ?>
        <?php foreach($terms_3 as $el_3) : ?>
        <?php if ($el != $el_3) : ?>
        <?php get_template_part(THEME_CMP, "product-cat-slider-item", $el) ?>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <div class="slide-next slide-nav text-brown transition-all right-0 h-full bg-biege flex items-center">
        <svg viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg"
            class="w-8 sm:w-10 xl:w-14 fill-current drop-shadow-xl opacity-70 hover:opacity-100 cursor-pointer transition-all">
            <path
                d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z" />
        </svg>
    </div>
</div>