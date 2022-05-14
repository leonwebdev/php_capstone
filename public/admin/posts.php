<?php

require __DIR__ . '/config/config.php';
// ----- SET PAGE TITLE ------------------------
$title = 'Posts | Administration';

/*--------------------------------------------------------------------------*/

/*-----------             ACTUAL CODE IN THIS PAGE              ------------*/

/*--------------------------------------------------------------------------*/

$post_dtls = $posts->getAll();

$post_dtls = array_reverse($post_dtls);

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

            <div class="my-5">
                <a class="btn btn-success" href="./post_create.php">Create a Post</a>
            </div>

            <table id="admin_posts" class="table table-striped table-bordered">
                <tr>
                    <th>Index</th>
                    <th>Post ID</th>
                    <th>Title</th>
                    <th>Count of Comments</th>
                    <th>Create Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($post_dtls as $key => $post_dtl) : ?>
                <tr>
                    <th><?= esc($key + 1) ?></th>
                    <td><?= esc($post_dtl['id']) ?></td>
                    <td>
                        <a class="text-decoration-none"
                            href="/?p=post&postid=<?= esc_attr($post_dtl['id']) ?>"><?= esc($post_dtl['title']) ?></a>
                    </td>
                    <td><?= esc($cmt->getCommentCountByPostId($post_dtl['id'])) ?></td>
                    <td><?= esc(formatDateTime($post_dtl['created_at'])) ?></td>
                    <td <?= ('post' != $post_dtl['status']) ? "class=\"bg-warning text-dark fw-bold\"" : "" ?>>
                        <?= esc($post_dtl['status']) ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary me-2" href="">Edit</a>
                        <a class="btn btn-sm btn-danger me-2" href="">Delete</a>
                        <a class="btn btn-sm btn-success me-2" href="">Publish</a>
                        <a class="btn btn-sm btn-warning" href="">Hide</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>

</body>

</html>