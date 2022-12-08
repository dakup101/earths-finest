<?php /* Template Name: Homepage */ ?>
<?php get_header(); ?>
<main>
    <section>
        <?php get_template_part(THEME_CMP, 'hero'); ?>
    </section>
    <section class="bg-biege pb-56 xxs:pb-64 midxs:pb-72 sm:pb-0 py-10">
        <div class="container mx-auto">
            <p
                class="italic font-serif text-normal leading-loose lg:leading-normal lg:text-xl sm:w-2/3 text-center mx-auto mt-5 mb-10 text-dark-light">
                <?php echo get_field('cats_text'); ?>
            </p>
            <?php get_template_part(THEME_CMP, 'product-cat-slider' ) ?>
            <a href="<?php echo get_field('cats_btn_link') ?>" class="ef-accent-btn mx-auto mt-8">
                <span class="relative z-10"><?php echo get_field('cats_btn_text') ?></span>
            </a>
        </div>
    </section>
    <picture>
        <img src="<?php echo THEME_IMG . 'wave.png' ?>" alt="Wave Background">
    </picture>
    <section class="mb-5">
        <div class="container mx-auto">
            <div class="grid sm:grid-cols-2 gap-20">
                <div class="relative">
                    <img src="<?php echo get_field('recipes_image') ?>" alt="Earth's Finest recepies"
                        class="absolute -bottom-14 sm:bottom-14 md:bottom-0 left-0 w-full">
                </div>
                <div>
                    <h2 class="text-5xl sm:text-8xl text-brown-light font-semibold mb-10">
                        <?php echo get_field('recipes_title'); ?>
                    </h2>
                    <div class="text-dark-light font-light text-normal lg:text-lg ">
                        <?php echo get_field('recipes_text') ?>
                    </div>
                    <?php
                    $args = array(
                        'taxonomy' => 'meal',
                        'hide_empty' => false,
                    );
                    $meals = get_terms($args);
                    $meals_count = count($meals);
                    $counter = 0;
                    ?>
                    <ul class="flex flex-wrap mt-10 md:my-10 list-none p-0">
                        <?php foreach($meals as $meal): ?>
                        <li class="font-bold">
                            <?php
                            $name = $meal->name;
                            ?>
                            <a href="#" data-meal="<?php echo $meal->term_id ?>"
                                class="recipes-change-trigger text-brown hover:text-brown-light text-lg">
                                <?php echo $name; ?>
                            </a>
                            <?php if ($counter < $meals_count-1): ?>
                            <span>
                                &nbsp;&nbsp; / &nbsp;&nbsp;
                            </span>
                            <?php endif; ?>
                        </li>
                        <?php $counter++; endforeach; ?>
                    </ul>

                </div>
            </div>
            <div class="mt-12 py-8 recipes-slider-wrapper">
                <?php get_template_part(THEME_CMP, 'recipes-slider' ) ?>
            </div>
            <a href="<?php echo get_field('recipes_button_link') ?>" class="ef-accent-btn mx-auto mt-5  ">
                <span class="relative z-10"><?php echo get_field('recipes_button_text') ?></span>
            </a>
        </div>
    </section>
    <?php get_template_part(THEME_CMP , 'about-section'); ?>
</main>
<?php get_footer(); ?>