<?php
function recipes_html() {
$meals = $_POST['meal'];
$diets = $_POST['diet'];
$products = $_POST['product'];
$paged = $_POST['page'];

$args = array(
    "post_type" => "recipe",
    "numberposts" => -1,
    "posts_per_page" => 11,
    "status" => "publish",
    "paged" => $paged,
);

if (!empty($meals) || !empty($diets)) {
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
    if (!empty($diets)) {
        foreach (explode(",", $diets) as $el){
            array_push($args['tax_query'], array(
                'taxonomy' => "diet",
                'field' => "id",
                'terms' => $el
            ));
        }
    }
}

if (!empty($products)) {
    $prod_array = explode(",", $products);
    $args['meta_query'] = array(
    );
    foreach ($prod_array as $el) {
        array_push($args['meta_query'], array(
            'key' => 'cooked_with_$_product',
            'value' => $el,
            'compare' => '='
        ));
    }
}

$recipes = new WP_Query($args);
$recipes_counter = 0;
ob_start();
if ($recipes->have_posts()): ?>


<div class="grid sm:grid-cols-2 gap-10">
    <? while ($recipes->have_posts()) : $recipes->the_post(); ?>
    <?php $recipes_counter == 0 ? get_template_part(THEME_CMP, 'archive-recipe-first-item') : get_template_part(THEME_CMP, 'archive-recipe-item'); ?>
    <?php $recipes_counter++; endwhile; ?>
</div>
<div class="ef-pagination">
    <?php echo paginate_links(
                array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => $paged,
                    'total' => $recipes->max_num_pages //$q is your custom query
                )
            );?>
</div>

<? else: ?>
<div class="col-span-2">
    <div class="text-2xl text-brown text-center max-w-xs mx-auto">No recipies found matching selected filters</div>
</div>
<?php
endif;
wp_reset_postdata();
return ob_get_clean();
}