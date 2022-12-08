<?php 
get_header();
global $post;
$banner = get_field('banner');
$posts_counter = 0;
$time = get_field('time', $id);
$serves = get_field('serves', $id);

$post_ingridients = get_the_terms($post->ID, 'ingridient');
$ingridients = get_terms(array(
    'taxonomy' => 'ingridient',
    'hide_empty' => true,
));
$attrData = array();

foreach ($ingridients as $term){
	foreach ($post_ingridients as $post_term){
		if ($term->name == $post_term->name) {
			array_push($attrData, array(
				"name" => $post_term->name,
				"icon" => get_field("icon", $post_term),
			));
		}
	}
}
?>

<div class="relative bg-cover min-h-72 sm:min-h-screen bg-center flex items-center justify-center"
    style="background-image:url('<?php echo $banner ?>')">
    <div class="container mx-auto pb-16">
        <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="text-5xl sm:text-8xl text-white text-center font-semibold"><?php echo get_the_title() ?></h1>
        <div class="flex items-center text-white justify-center my-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-5 h-5 mr-3" viewBox="0 0 16 16">
                <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z" />
                <path
                    d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z" />
            </svg>
            <p>Time: <?php echo $time ?></p>
            <span class="font-bold">&nbsp; | &nbsp;</span>
            <p>Serves: <?php echo $serves ?></p>
        </div>
        <?php endif; ?>
    </div>
    <img src="<?php echo THEME_IMG . 'wave-white-up.svg' ?>" alt="" class="w-full absolute -bottom-1 right-0">
</div>
<div class="container mx-auto grid sm:grid-cols-7">
    <div
        class="sm:col-span-5 sm:mr-16 relative after:hidden sm:after:block after:absolute after:right-0 after:top-0 after:h-full after:w-0.5 after:bg-accent/20">
        <div class="sm:pr-16">
            <div class="mb-10">
                <h2 class="text-brown text-4xl mb-5 leading-normal">Ingridients:</h2>
                <?php echo get_field('ingridients') ?>
            </div>
            <div class="mb-5">
                <h2 class="text-brown text-4xl mb-5 leading-normal">Method:</h2>
                <?php echo get_field('method') ?>
            </div>
        </div>
        <hr class="border border-accent/20">
        <div class="my-5">
            <?php
 if(function_exists('zm_sh_btn')){
	$options['iconset']		= 'flat';
	$options['iconset_type']	= 'circle';
	$options['class']			= 'in_php_function';
	$options['icons']			= array( 'facebook', 'twitter', 'linkedin', 'pinterest' );
	echo zm_sh_btn($options);
}
?>
        </div>
    </div>
    <div class="sm:col-span-2">
        <h2 class="text-xl uppercase text-brown mb-5 leading-normal">
            Products used in this recipe
        </h2>
        <?php foreach(get_field('cooked_with') as $el) : ?>
        <?php
            $product = wc_get_product($el['product']);
            $img = get_the_post_thumbnail_url($product->get_id());
            $name = $product->get_name();
            $link = $product->get_permalink();
            ?>
        <a href="<?php echo $link ?>" class="flex items-center hover:text-brown transition-all mb-3">

            <img src="<?php echo $img ?>" alt="" class="w-28">
            <h3 class="font-sans font-semibold uppercase ml-3 text-sm"><?php echo $name ?></h3>
        </a>
        <?php endforeach; ?>
        <div class="grid grid-cols-3 my-10">
            <?php foreach($attrData as $el) : ?>
            <div class="flex items-center flex-col mr-5">
                <div class="p-3 w-fit aspect-square rounded-full bg-brownish mb-3">
                    <img src="<?php echo $el['icon']?>" alt="" class="w-7">
                </div>
                <div class="uppercase font-light text-sm">
                    <?php echo $el['name'] ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php get_template_part(THEME_CMP , 'about-section'); ?>
<?php get_footer(); ?>