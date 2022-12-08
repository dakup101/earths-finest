<?php
function posts_html() {
$cats = $_POST['cats'];
$paged = $_POST['page'];

$args = array(
    "post_type" => "post",
    "posts_per_page" => 11,
    "status" => "publish",
    "paged" => $paged,
);

if (!empty($cats)) {
    $args['tax_query'] = array(
        'relation' => 'AND',
    );
}

if (!empty($args['tax_query'])) {
    if (!empty($cats)) {
        foreach (explode(",", $cats) as $el) {
            array_push($args['tax_query'], array(
                'taxonomy' => "category",
                'field' => "id",
                'terms' => $el
            ));
        }
    }
}

$posts = new WP_Query($args);
$posts_counter = 0;
ob_start();
if ($posts->have_posts()): ?>
<div class="grid sm:grid-cols-2 gap-10">
    <?php while ($posts->have_posts()) : $posts->the_post(); ?>
    <?php $posts_counter == 0 ? get_template_part(THEME_CMP, 'archive-post-first-item') : get_template_part(THEME_CMP, 'archive-post-item'); ?>
    <?php $posts_counter++; endwhile; ?>
</div>

<div class="ef-pagination">
    <?php echo paginate_links(
                array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => $paged,
                    'total' => $posts->max_num_pages //$q is your custom query
                )
            );?>
</div>

<? else: ?>
<div class="col-span-2">
    <div class="text-2xl text-brown text-center max-w-xs mx-auto">No posts found matching selected filters</div>
</div>
<?php
endif;
wp_reset_postdata();
return ob_get_clean();
}