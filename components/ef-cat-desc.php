<?php
$args = wp_parse_args( $args, array(
    "desc" => null,
    "img" => null,
    "usage" => null
));
$desc = $args['desc'];
$img = $args['img'];
$usage = $args['usage'];
?>

<div class="grid sm:grid-cols-12 gap-10 relative items-center mt-20">
    <div class="sm:col-span-5 z-10">
        <img src="<?php echo $img; ?>" alt="" class="w-full">
    </div>
    <div class="sm:col-span-6 z-10 px-5 sm:px-10 mb-24">
        <div class="cat-text text text-dark-light">
            <?php echo $desc; ?>
        </div>
    </div>
    <img src="<?php echo THEME_IMG . 'divider-up.png' ?>" alt="" class="w-full absolute bottom-0">
</div>

<div class="bg-biege-dark py-10 w-full">
    <div class="usage-text text max-w-5xl mx-auto text-dark-light px-5 sm:text-xl">
        <?php echo $usage; ?>
    </div>
</div>

<div>
    <img src="<?php echo THEME_IMG . 'divider-down.png' ?>" alt="" class="w-full">
</div>

<div class="mb-10">
    <div class="container mx-auto">
        <div class="text text-center mb-10">
            <h2>Recipes</h2>
        </div>
        <?php get_template_part(THEME_CMP, 'recipes-slider' ) ?>
    </div>
    <a href="/recipes" class="ef-accent-btn mx-auto mt-20">
        <span class="relative z-10">See all Recipes</span>
    </a>
</div>