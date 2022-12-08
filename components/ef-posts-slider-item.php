<?php
global $post;
$img = get_the_post_thumbnail_url();
$name = get_the_title();
$id = get_the_id();
$link = get_the_permalink();
?>

<a href="<?php echo $link; ?>" class="block">
    <figure class="w-full h-64 rounded-lg shadow-xl overflow-hidden relative">
        <img src="<?php echo $img ?>" alt="<?php echo $name ?>" class="object-cover object-center w-full h-full">
        <div
            class="absolute top-0 left-0 h-full w-full flex items-center justify-center bg-brown/60 text-white opacity-0 hover:opacity-100 transition-all font-semibold font-alt">
        </div>
    </figure>
</a>
<a href="<?php echo $link; ?>" class="block mt-5 text-brown hover:text-dark transition-all text-2xl">
    <?php echo $name; ?>
</a>