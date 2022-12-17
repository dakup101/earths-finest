<div class="grid gap-10">
    <div>
        <?php
        $args = array(
            'post_type' => 'recipe',
            'taxonomy'  => 'meal',
            'hide_empty' => true,
        );
        $els = get_terms( $args );
        ?>

        <h3 class="font-alt text-brown text-2xl mb-3 leading-tight uppercase">Meals:</h3>
        <ul class="list-none p-0">
            <?php foreach ($els as $el): ?>
            <li>
                <label for="<?php echo $el->slug; ?>" class="ef-checkbox">
                    <input type="checkbox" value="<?php echo $el->term_id; ?>" data-id="<?php echo $el->term_id; ?>"
                        class="hidden recipe-filter" data-filter="meal" id="<?php echo $el->slug ?>">
                    <span><?php echo $el->name; ?></span>
                </label>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div>
        <?php
        $args = array(
            'post_type' => 'recipe',
            'taxonomy'  => 'diet',
            'hide_empty' => true,
        );
        $diets = get_terms( $args );
        ?>

        <h3 class="font-alt text-brown text-2xl mb-3 leading-tight uppercase">Diet:</h3>
        <ul class=" list-none p-0">
            <?php foreach ($diets as $el): ?>
            <li>
                <label for="<?php echo $el->slug; ?>" class="ef-checkbox">
                    <input type="checkbox" value="<?php echo $el->term_id; ?>" data-id="<?php echo $el->term_id; ?>"
                        class="hidden recipe-filter" data-filter="diet" id="<?php echo $el->slug ?>">
                    <span><?php echo $el->name; ?></span>
                </label>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div>
        <?php
        $args = array(
            'post_type' => 'recipe',
            'numberposts' => -1,
            'hide_empty' => true,
        );
        $cooked_with = array();
        $recipes = new WP_Query($args);
       
        while ($recipes->have_posts()) {
            $recipes->the_post();
            $ingridients = get_field('cooked_with_cat');
            if (!empty($ingridients)) {
                foreach ($ingridients as $el) {
                    if (!in_array($el['product'], $cooked_with)) array_push($cooked_with, $el['product']);
                }
            }
        }
        wp_reset_postdata();
        ?>

        <h3 class="font-alt text-brown text-2xl mb-3 leading-tight uppercase">Cooked With:</h3>
        <ul class="list-none p-0">
            <?php  foreach($cooked_with as $cat_id): ?>
            <li>
                <?php  $cat = get_term_by( 'id', $cat_id, 'product_cat'); ?>
                <label for="<?php echo $cat->slug ?>" class="ef-checkbox">
                    <input type="checkbox" value="<?php echo $cat->term_id; ?>" data-filter="product"
                        class="hidden recipe-filter" data-id="<?php echo $cat->term_id ?>" id="<?php echo $cat->slug?>">
                    <span><?php echo $cat->name   ?></span>
                </label>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>