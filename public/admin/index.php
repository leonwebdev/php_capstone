<?php

require __DIR__ . '/config/config.php';
// ----- SET PAGE TITLE ------------------------
$title = 'Dashboard | Administration';

/*--------------------------------------------------------------------------*/

/*-----------             ACTUAL CODE IN THIS PAGE              ------------*/

/*--------------------------------------------------------------------------*/

// ----- Get recent ten log entries --------------------
$recent_ten_log_entries = $databaseLogger->getRecentTenEntries();

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

    <h1 class="mb-5"><?= esc($title); ?></h1>
    <h2>Site Meter</h2>
    <div class="container row mb-5 ">
        <table class="table table-striped table-bordered" style="text-align: center;">
            <tr>
                <th>Posts per Category</th>
                <th>Posts per User</th>
                <th>Comments per User</th>
            </tr>
            <tr>
                <td>Min: <?= esc($posts->getMinPostsCountByCategory()) ?></td>
                <td>Min: <?= esc($posts->getMinPostsCountByUser()) ?></td>
                <td>Min:</td>
            </tr>
            <tr>
                <td>Max: <?= esc($posts->getMaxPostsCountByCategory()) ?></td>
                <td>Max: <?= esc($posts->getMaxPostsCountByUser()) ?></td>
                <td>Max:</td>
            </tr>

        </table>
    </div>
    <div class="row">

        <div class="main col-12">
            <h2>Recent Log Entries</h2>

            <table id="log" class="table table-striped table-bordered">
                <tr>
                    <th>date/time | http status | request method | request URI | User Browser Info</th>
                </tr>
                <?php foreach ($recent_ten_log_entries as $key => $value) : ?>
                <tr>
                    <td>
                        <small><?= esc($value['event']) ?></small>
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