<?php
global $post;
$img = get_the_post_thumbnail_url();
$name = get_the_title();
$id = get_the_id();
$time = get_field('time', $id);
$serves = get_field('serves', $id);
$link = get_the_permalink();
?>



<article>
    <header class="relative">
        <a href="<?php echo $link; ?>" class="block">
            <figure class="w-full h-44 sm:h-64 rounded-lg shadow-xl overflow-hidden relative">
                <img src="<?php echo $img ?>" alt="<?php echo $name ?>"
                    class="object-cover object-center w-full h-full">
            </figure>
        </a>
        <span
            class="mb-2 uppercase text-brownish bg-biege text-xs absolute block -bottom-1.5 p-3 rounded-lg shadow-lg font-light left-5 translate-y-1/2"><?php echo get_field("reading_time") ?></span>

    </header>
    <main class="p-5 font-light">
        <h2>
            <a href="<?php echo $link; ?>"
                class="block mt-5 text-brown hover:text-dark transition-all text-xl font-alt mb-3 font-semibold">
                <?php echo $name; ?>
            </a>
        </h2>

        <div class=" text-md text-dark/70">
            <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
        </div>
    </main>
</article>