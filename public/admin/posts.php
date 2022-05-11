<?php

require __DIR__ . '/config/config.php';
// ----- SET PAGE TITLE ------------------------
$title = 'Posts | Administration';

/*--------------------------------------------------------------------------*/

/*-----------             ACTUAL CODE IN THIS PAGE              ------------*/

/*--------------------------------------------------------------------------*/

$post_dtls = $posts->getAll();

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

    <div class="row">
        <h1 class="mb-5"><?= esc($title); ?></h1>
        <div class="main col-12">

            <table id="admin_posts" class="table table-striped table-bordered">
                <tr>
                    <th>Post ID</th>
                    <th>Title</th>
                    <th>Create Date</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($post_dtls as $key => $post_dtl) : ?>
                    <tr>
                        <th><?= esc($post_dtl['id']) ?></th>
                        <td><?= esc($post_dtl['title']) ?></td>
                        <td><?= esc($post_dtl['created_at']) ?></td>
                        <td>button</td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>