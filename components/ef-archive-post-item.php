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
                <div
                    class="absolute top-0 left-0 h-full w-full flex items-center justify-center bg-brown/60 text-white opacity-0 hover:opacity-100 transition-all">
                </div>
            </figure>
        </a>
        <span
            class="mb-2 uppercase text-brownish bg-biege text-xs absolute block -bottom-1.5 p-3 rounded-lg shadow-lg font-light left-5 translate-y-1/2"><?php echo time_ago(); ?></span>

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