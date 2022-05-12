<?php

require __DIR__ . '/config/config.php';
// ----- SET PAGE TITLE ------------------------
$title = 'Users | Administration';

/*--------------------------------------------------------------------------*/

/*-----------             ACTUAL CODE IN THIS PAGE              ------------*/

/*--------------------------------------------------------------------------*/

$user_dtls = $user->getAll();

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

            <table id="admin_users" class="table table-striped table-bordered">
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Count of Posts</th>
                    <th>Count of Comments</th>
                    <th>Registered Date</th>
                </tr>
                <?php foreach ($user_dtls as $key => $user_dtl) : ?>
                    <tr>
                        <th><?= esc($user_dtl['id']) ?></th>
                        <td><?= esc($user_dtl['first_name'] . ' ' . $user_dtl['last_name']) ?></td>
                        <td><?= esc($user_dtl['email']) ?></td>
                        <td><?= esc($posts->getPostCountByUserId($user_dtl['id'])) ?></td>
                        <td><?= esc($cmt->getCommentCountByUserId($user_dtl['id'])) ?></td>
                        <td><?= esc($user_dtl['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>