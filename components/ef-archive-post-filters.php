<div class="grid gap-10">
    <div>
        <?php
        $args = array(
            'post_type' => 'post',
            'taxonomy'  => 'category',
            'hide_empty' => true,
        );
        $els = get_terms( $args );
        ?>

        <h3 class="font-alt text-brown text-4xl leading-tight font-semibold">Categories:</h3>
        <ul class="list-none p-0">
            <?php foreach ($els as $el): ?>
            <li>
                <label for="<?php echo $el->slug; ?>" class="ef-checkbox">
                    <input type="checkbox" value="<?php echo $el->term_id; ?>" data-id="<?php echo $el->term_id; ?>"
                        class="hidden post-filter" data-filter="category" id="<?php echo $el->slug ?>">
                    <span><?php echo $el->name; ?></span>
                </label>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>