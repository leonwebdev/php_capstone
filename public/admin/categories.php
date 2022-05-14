<?php

require __DIR__ . '/config/config.php';
// ----- SET PAGE TITLE ------------------------
$title = 'Categories | Administration';

/*--------------------------------------------------------------------------*/

/*-----------             ACTUAL CODE IN THIS PAGE              ------------*/

/*--------------------------------------------------------------------------*/

$cat_dtls = $cat->getAll();

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

            <table id="admin_categories" class="table table-striped table-bordered">
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th>Count of Posts</th>
                    <th>Create Date</th>
                </tr>
                <?php foreach ($cat_dtls as $key => $cat_dtl) : ?>
                <tr>
                    <th><?= esc($cat_dtl['id']) ?></th>
                    <td><?= esc($cat_dtl['title']) ?></td>
                    <td><?= esc($posts->getPostCountByCategoryId($cat_dtl['id'])) ?></td>
                    <td><?= esc($cat_dtl['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>

</body>

</html>