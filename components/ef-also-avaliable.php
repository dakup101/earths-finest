<div>
    <div class="text-4xl font-light text-center font-alt text-brown mb-10">Also avaliable at:</div>
    <div class="grid sm:grid-cols-4 items-center gap-10 px-20">
        <?php foreach(get_field('avaliable_at_logos', 'options') as $el) : ?>
        <figure class="grayscale">
            <img src="<?php echo $el['logo'] ?>" alt="">
        </figure>
        <?php endforeach; ?>
    </div>
</div>