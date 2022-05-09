<?php include __DIR__ . '/inc/header.inc.php'; ?>

<div class="main_wrapper">

    <div class="post_hero_pic">
        <img src="./images/posts/<?= esc_attr($post_detail['image']); ?>" class="img-auto-width post_hero_pic">
    </div>
    <p style="margin-top: 0.2rem;color:#84878b;">
        - <?= esc($post_detail['summary']); ?>
    </p>

    <h1 style="margin-top: 2.5rem;"><?= esc($post_detail['title']); ?></h1>
    <div class="flex-container">
        <div class="mr1 post_detail_2_row border-r-1 pr-1">Leon</div>
        <div class="mr1 post_detail_2_row border-r-1 pr-1"><?= esc(formatDateTime($post_detail['published_at'])); ?>
        </div>
        <div class="mr1 post_detail_2_row "><?= esc(count($comments)); ?> Comments</div>
    </div>
    <div class="post_content">
        <?= html($post_detail['content']); ?>
    </div>
    <div class="flex-container post_detail_recommand_block">
        <?php for ($i = 0; $i < 3; $i++) : ?>
            <div class="pd1 post_recommend_card">
                <div>
                    <a href="/?p=post&postid=<?= esc_attr($i + 1); ?>" class="plain_a post_card_a fw-700 recmd_artical_title">More
                        Aticle Title</a>
                </div>
                <div style="color: #84878b;"><small>April 31</small></div>
            </div>
            <?php if ($i < 2) : ?>
                <div class="post_recommend_dilimiter"></div>
            <?php endif; ?>
        <?php endfor; ?>
    </div>
    <div class="flex-container pd1 category_list">
        <div>
            <?php foreach ($categories as $category) : ?>
                <div class="post_category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a"><?= esc($category['title']); ?></a></div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="comment_exhibition">
        <?php foreach ($comments as $comment) : ?>
            <div class="cmt-card flex-container">
                <div><img class="cmt-pic" src="images/profile_of_comment.jpeg"></div>
                <div>
                    <div class="flex-container">
                        <div class="mr1 border-r-1 pr-1 fw-700">
                            <?= esc($user->getUserNameByIdRelatingToComment($comment['userid'])); ?>
                        </div>
                        <div class="mr1 post_detail_2_row pr-1">
                            <small><?= esc(formatDateTime($comment['created_at'])); ?></small>
                        </div>
                    </div>
                    <div class="mt1"><?= html($comment['content']); ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="comment_block">
        <form id="comment_form" action="" method="post">
            <h2>Please Leave Your Comment</h2>
            <p><a href="/?p=login" class="plain_a post_card_a fw-700 recmd_artical_title">Login</a> or
                <a href="/?p=register" class="plain_a post_card_a fw-700 recmd_artical_title">Register</a> to leave a
                comment.
            </p>
            <div>
                <textarea name="content" id="textarea_comment"></textarea>
            </div>
            <p><button type="submit" class="rm-btn-margin btn-w-fix btn-p-small">Send</button></p>
        </form>
    </div>
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>