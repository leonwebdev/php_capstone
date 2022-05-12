<?php

require __DIR__ . '/config/config.php';
// ----- SET PAGE TITLE ------------------------
$title = 'Comments | Administration';

/*--------------------------------------------------------------------------*/

/*-----------             ACTUAL CODE IN THIS PAGE              ------------*/

/*--------------------------------------------------------------------------*/

$cmt_dtls = $cmt->getAll();

$cmt_dtls = array_reverse($cmt_dtls);

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

            <table id="admin_comments" class="table table-striped table-bordered">
                <tr>
                    <th>Index</th>
                    <th>Comment ID</th>
                    <th>Author</th>
                    <th>At This Post</th>
                    <th>Content</th>
                    <th>Create Date</th>
                </tr>
                <?php foreach ($cmt_dtls as $key => $cmt_dtl) : ?>
                    <tr>
                        <th><?= esc($key + 1) ?></th>
                        <td><?= esc($cmt_dtl['id']) ?></td>
                        <td><?= esc($user->getUserNameByIdRelatingToComment($cmt_dtl['userid'])) ?></td>
                        <td>
                            <a class="text-decoration-none" href="/?p=post&postid=<?= esc_attr($cmt_dtl['postid']) ?>"><?= esc($posts->getTitleById($cmt_dtl['postid'])) ?></a>
                        </td>
                        <td>
                            <a class="text-decoration-none" href="/?p=post&postid=<?= esc_attr($cmt_dtl['postid'] . '#cmt' . $cmt_dtl['id']) ?>">
                                <?= html((strlen($cmt_dtl['content']) < 70) ? $cmt_dtl['content'] : substr($cmt_dtl['content'], 0, 60) . "...") ?>
                            </a>
                        </td>
                        <td><?= esc($cmt_dtl['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>