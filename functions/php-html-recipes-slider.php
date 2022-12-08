<?php
function recipes_slider_html() {
$meals = $_POST['meal'];

$args = array(
    "post_type" => "recipe",
    "numberposts" => -1,
    "status" => "publish"
);

if (!empty($meals)) {
    $args['tax_query'] = array(
        'relation' => 'AND',
    );
}

if (!empty($args['tax_query'])) {
    if (!empty($meals)) {
        foreach (explode(",", $meals) as $el){
            array_push($args['tax_query'], array(
                'taxonomy' => "meal",
                'field' => "id",
                'terms' => $el
            ));
        }
    }
}

$recipes = new WP_Query($args);
ob_start();
if ($recipes->have_posts()):
?>
<div class="ef-recipes-slider overflow-hidden relative px-12 sm:px-20">
    <div class="slide-prev slide-nav text-brown transition-all left-0 h-full bg-white flex items-center">
        <svg viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg"
            class="w-8 sm:w-14 fill-current drop-shadow-xl rotate-180 opacity-70 hover:opacity-100 cursor-pointer transition-all">
            <path
                d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z" />
        </svg>
    </div>
    <div class="swiper-wrapper">
        <?php while ($recipes->have_posts()): $recipes->the_post() ?>
        <div class="swiper-slide">
            <?php get_template_part( THEME_CMP, 'recipes-slider-item' ) ?>
        </div>
        <?php endwhile; ?>
    </div>
    <div class="slide-next slide-nav text-brown transition-all right-0 h-full bg-white flex items-center">
        <svg viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg"
            class="w-8 sm:w-14 fill-current drop-shadow-xl opacity-70 hover:opacity-100 cursor-pointer transition-all">
            <path
                d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z" />
        </svg>
    </div>
</div>
<?php else: ?>
<div class="text-center text-xl text-brown">No recipies were found for this meal. Please pick another one.</div>
<?php
endif;
wp_reset_postdata();
return ob_get_clean();
}