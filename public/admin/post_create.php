<?php

require __DIR__ . '/config/config.php';
// ----- SET PAGE TITLE ------------------------
$title = 'Post | Administration';

/*--------------------------------------------------------------------------*/

/*-----------             ACTUAL CODE IN THIS PAGE              ------------*/

/*--------------------------------------------------------------------------*/

include __DIR__ . '/inc/header.inc.php';

?><div class="content container mt-5 mb-5">

    <?php if (!empty($flash['success'])) : ?>
    <div class="alert alert-success">
        <?= esc($flash['success']) ?>
    </div>
    <?php endif; ?>

    <?php if (!empty($flash['error'])) : ?>
    <div class="alert alert-danger">
        <?= esc($flash['error']) ?>
    </div>
    <?php endif; ?>

    <h1 class="mb-5">Create a New Post</h1>

</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>