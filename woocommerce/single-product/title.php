<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */
global $product;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

the_title( '<h1 class="product_title entry-title text-5xl text-brown-light mb-5">', '</h1>' );


$product_attributes = explode(", ", $product->get_attribute("pa_labels"));
$attributes = get_terms('pa_labels');
$attrData = array();

foreach ($attributes as $attr){
	foreach ($product_attributes as $pAttr){
		if ($attr->name == $pAttr) {
			array_push($attrData, array(
				"name" => $pAttr,
				"icon" => get_field("icon", $attr),
			));
		}
	}
}

?>

<div class="grid grid-cols-3 sm:grid-cols-5 my-10">
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

<?php if (!empty(get_field('accordions'))) : ?>
<div class="grid gap-5 mb-10">
    <?php foreach(get_field('accordions') as $el) : ?>
    <div class="accordion-item">
        <div class="accordion-trigger font-alt leading-3 cursor-pointer text-2xl flex items-center text-brown">
            <?php echo $el['accordion_name']?>
            <div class="bg-brownish p-1 w-fit rounded-full ml-5 mb-2">
                <svg viewBox="0 0 700 700" xmlns="http://www.w3.org/2000/svg"
                    class="w-3 fill-white drop-shadow-xl rotate-90">
                    <path
                        d="M193.858 582.529C172.714 603.681 172.714 637.983 193.858 659.135C215.001 680.288 249.287 680.288 270.43 659.135L541.142 388.303C562.286 367.151 562.286 332.849 541.142 311.697L270.43 40.8646C249.287 19.7118 215.001 19.7118 193.858 40.8646C172.714 62.0173 172.714 96.3186 193.858 117.471L426.283 350L193.858 582.529Z" />
                </svg>
            </div>
        </div>
        <div class="accordion-content overflow-hidden transition-all">
            <?php echo $el['accordion_content'] ?>
        </div>
    </div>

    <?php endforeach; ?>
</div>
<?php endif; ?>