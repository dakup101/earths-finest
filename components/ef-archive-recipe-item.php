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
    <a href="<?php echo $link; ?>" class=" col-span-1 rounded-lg hover:bg-biege block transition-all">
        <header href="<?php echo $link; ?>" class="block">
            <figure class="w-full h-44 sm:h-64 rounded-lg shadow-xl overflow-hidden relative">
                <img src="<?php echo $img ?>" alt="<?php echo $name ?>"
                    class="object-cover object-center w-full h-full">
                <div
                    class="absolute top-0 left-0 h-full w-full flex items-center justify-center bg-brown/60 text-white opacity-0 hover:opacity-100 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-7 h-7 mr-3" viewBox="0 0 16 16">
                        <path d="M8.5 5.6a.5.5 0 1 0-1 0v2.9h-3a.5.5 0 0 0 0 1H8a.5.5 0 0 0 .5-.5V5.6z" />
                        <path
                            d="M6.5 1A.5.5 0 0 1 7 .5h2a.5.5 0 0 1 0 1v.57c1.36.196 2.594.78 3.584 1.64a.715.715 0 0 1 .012-.013l.354-.354-.354-.353a.5.5 0 0 1 .707-.708l1.414 1.415a.5.5 0 1 1-.707.707l-.353-.354-.354.354a.512.512 0 0 1-.013.012A7 7 0 1 1 7 2.071V1.5a.5.5 0 0 1-.5-.5zM8 3a6 6 0 1 0 .001 12A6 6 0 0 0 8 3z" />
                    </svg>
                    <p>Time: <?php echo $time ?></p>
                    <span class="font-bold">&nbsp; | &nbsp;</span>
                    <p>Serves: <?php echo $serves ?></p>
                </div>
            </figure>
        </header>
        <main class="px-5 pb-5">
            <h2 href="<?php echo $link; ?>"
                class="block mt-5 mb-3 text-brown hover:text-dark transition-all text-2xl font-alt font-semibold">
                <?php echo $name; ?>
            </h2>
            <p><?php echo wp_trim_words( get_the_excerpt(), 20, '...' ); ?></p>
        </main>
    </a>
</article>