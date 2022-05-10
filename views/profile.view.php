<?php

include __DIR__ . '/inc/header.inc.php';

?>
<!-- HEADER --------------------------------- -->
<div class="main_wrapper">
    <h1>Your <?= esc($title) ?></h1>

    <?php if (!empty($flash['success'])) : ?>
        <div class="flash success">
            <?= esc($flash['success']) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($flash['error'])) : ?>
        <div class="flash error">
            <?= esc($flash['error']) ?>
        </div>
    <?php endif; ?>

    <div class="flex-container" style="width:100%; margin: 2rem 0;">
        <div><img src="./images/rose.jpg" alt="profile img" style="border-radius: 999px;width:8rem;"></div>
        <div style="flex-basis: max-content; padding: 0 2em;">
            <h2 style="margin-top: 0;">Your Information</h2>
            <p><strong>First Name</strong>: <?= esc($results['first_name']) ?></p>
            <p><strong>Last Name</strong>: <?= esc($results['last_name']) ?></p>
            <p><strong>Phone</strong>: <?= esc($results['phone']) ?></p>
            <p><strong>Email</strong>: <?= esc($results['email']) ?></p>
            <h2 style="margin-top: 3rem;">Mailing Address</h2>
            <p><strong>Street</strong>: <?= esc($results['street']) ?></p>
            <p><strong>City</strong>: <?= esc($results['city']) ?></p>
            <p><strong>Postal Code</strong>: <?= esc($results['postal_code']) ?></p>
            <p><strong>Province</strong>: <?= esc($results['province']) ?></p>
            <p><strong>Country</strong>: <?= esc($results['country']) ?></p>
        </div>
        <!-- User Info ------------------------------------------------------------------------- -->
        <div style="border-left: 1.5px solid #dadada; padding-left:2em;flex-grow:1;">
            <h2 style="margin-top: 0;">Your Comments</h2>

            <?php if (empty($_SESSION['user_id'])) : ?>
                <p>You have no comments yet. Go to
                    <a href="/?p=post" class="plain_a post_card_a fw-700 recmd_artical_title">Posts.</a>
                </p>
                <!-- If No Comment ----------------------------------------------------------------- -->
            <?php else : ?>
                <?php foreach ($cmt_details as $key => $cmt_detail) : ?>

                    <div class="flex-container" style="width: 100%;margin-bottom:2em;">
                        <div class="profile_li">
                            <div class="profile_li_num"><?= esc($key + 1); ?></div>
                        </div>
                        <div style="flex-grow: 1;">
                            <div style="color: #84878b;display:inline-block;">
                                <small><?= esc(formatDateTime($cmt_detail['created_at'])); ?></small>
                            </div>
                            <div style="display:inline-block;"><small>on</small>
                                <a href="/?p=post&postid=<?= esc_attr($cmt_detail['postid'] . '#cmt' . $cmt_detail['id']); ?>" class="plain_a post_card_a fw-700 recmd_artical_title">
                                    <?= esc($post->getTitleById($cmt_detail['postid'])); ?></a>
                            </div>
                            <div>
                                <a href="/?p=post&postid=<?= esc_attr($cmt_detail['postid'] . '#cmt' . $cmt_detail['id']); ?>" class="plain_a post_card_a recmd_artical_title" style="text-align: start;color:#84878b">
                                    <p><em><small><?= html($cmt_detail['content']); ?></small></em></p>
                                </a>
                            </div>
                        </div>
                        <div>
                            <form method="POST" action="/">
                                <input type="hidden" name="p" value="post">
                                <button type="submit" style="background-color: #d42b06;" class="rm-btn-margin btn-w-fix btn-p-xsmall rm-btn-box-shadow">Delete</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!-- Comment Block ------------------------------------------------------------------------- -->

    </div>
</div>
<!-- FOOTER --------------------------------- -->
<?php include __DIR__ . '/inc/footer.inc.php'; ?>