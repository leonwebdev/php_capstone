<?php include __DIR__ . '/inc/header.inc.php'; ?>

<div class="main_wrapper" style="min-height: 500px;">
    <h1><?= e($title) ?></h1>

    <section class="flex-container" style="flex-flow: nowrap;margin: 2.5em 0;">
        <div style="max-width: 300px;">
            <h1>Welcome to my Blog!</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At possimus molestiae maiores recusandae eos
                hic,
                temporibus tenetur, fugit laboriosam, nemo soluta consequuntur similique quidem sunt minima delectus.
                Exercitationem, ipsa libero.</p>
        </div>
        <div>
            <img src="./images/posts/1.jpg" class="img-auto-width post_hero_pic">
        </div>

    </section>

</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>