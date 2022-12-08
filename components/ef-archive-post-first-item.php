<?php
global $post;
$img = get_the_post_thumbnail_url();
$name = get_the_title();
$id = get_the_id();
$time = get_field('time', $id);
$serves = get_field('serves', $id);
$link = get_the_permalink();
?>



<article class="sm:col-span-2 grid sm:grid-cols-2 items-center">
    <header>
        <a href="<?php echo $link; ?>" class="block">
            <figure class="w-full h-44 sm:h-80 rounded-lg shadow-xl overflow-hidden relative">
                <img src="<?php echo $img ?>" alt="<?php echo $name ?>"
                    class="object-cover object-center w-full h-full">
            </figure>
        </a>
    </header>
    <main class="p-10 font-light">
        <span class="mb-2 uppercase text-brownish/60 text-md"><?php echo get_field("reading_time") ?></span>
        <h2>
            <a href="<?php echo $link; ?>"
                class="block mt-5 text-brown hover:text-dark transition-all text-3xl font-alt mb-3 font-semibold">
                <?php echo $name; ?>
            </a>
        </h2>

        <div class=" text-md text-dark/70">
            <?php the_excerpt() ?>
        </div>
    </main>
</article>