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
        <div class="mr1 post_detail_2_row border-r-1 pr-1">
            <a href="/?p=post&authorid=<?= esc_attr($post_detail['authorid']); ?>"
                class="plain_a post_card_a recmd_artical_title">
                <?= esc($user->getUserNameByIdRelatingToPost($post_detail['authorid'])); ?>
            </a>
        </div>
        <div class="mr1 post_detail_2_row border-r-1 pr-1"><?= esc(formatDateTime($post_detail['published_at'])); ?>
        </div>
        <div class="mr1 post_detail_2_row "><?= esc(count($comments)); ?> Comments</div>
    </div>
    <!-- post detail 2nd Row ---------------------------------------------- -->

    <div class="post_content">
        <?= html($post_detail['content']); ?>
    </div>
    <!-- Post Content Block ----------------------------------------------- -->

    <div class="flex-container post_detail_recommand_block">
        <?php foreach ($three_random_num as $key => $num) : ?>
        <div class="post_recommend_card">
            <div>
                <a href="/?p=post&postid=<?= esc_attr($num); ?>" class="plain_a post_card_a fw-700 recmd_artical_title">
                    <?= esc($post->getTitleById($num)); ?>
                </a>
            </div>
            <div style="color: #84878b;"><small>
                    <?= esc(formatDateTime($post->getPublishDateById($num))); ?>
                </small></div>
        </div>
        <?php if ($key < 2) : ?>
        <div class="post_recommend_dilimiter"></div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <!-- Recommend Article Block ------------------------------------------- -->

    <div class="flex-container pd1 category_list">
        <div>
            <?php foreach ($categories as $category) : ?>
            <div class="post_category">
                <a href="/?p=post&categoryid=<?= esc_attr($category['id']) ?>"
                    class="plain_a cat_list_a"><?= esc($category['title']); ?>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Category List Block ----------------------------------------------- -->

    <div id="comment_exhibition">
        <?php foreach ($comments as $comment) : ?>
        <div id="<?= esc_attr('cmt' . $comment['id']); ?>" class="cmt-card flex-container">
            <div>
                <img class="cmt-pic" src="images/profile_of_comment.jpeg">
            </div>
            <div>
                <div class="flex-container">
                    <div class="mr1 border-r-1 pr-1 fw-700">
                        <?= esc($user->getUserNameByIdRelatingToComment($comment['userid'])); ?>
                    </div>
                    <div class="mr1 post_detail_2_row pr-1">
                        <small><?= esc(formatDateTime($comment['created_at'])); ?></small>
                    </div>
                </div>
                <div class="mt1 max-w-30"><?= html($comment['content']); ?></div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <!-- Comment Exhibition Block ----------------------------------------------- -->

    <div id="comment_block">

        <?php if (!$post_detail['allow_comment']) : ?>
        <h2 class="flash error">This Post is not Allowed to comment!</h2>
        <?php else : ?>

        <form id="comment_form" action="#comment_block" method="post">
            <input type="hidden" name="csrf_token" value="<?= csrf() ?>" />
            <h2>Please Leave Your Comment</h2>

            <?php if (empty($_SESSION['user_id'])) : ?>

            <p><a href="/?p=login" class="plain_a post_card_a fw-700 recmd_artical_title">Login</a> or
                <a href="/?p=register" class="plain_a post_card_a fw-700 recmd_artical_title">Register</a> to leave a
                comment.
            </p>

            <?php else : ?>

            <div>
                <textarea name="content" id="textarea_comment"
                    placeholder="Leave a comment about this post..."><?= esc($_POST['content'] ?? '');  ?></textarea>
            </div>

            <span class="form_validate_error my-1 dspl-blk"><?= esc($errors['content'][0] ?? '') ?></span>

            <p><button type="submit" class="rm-btn-margin btn-w-fix btn-p-small">Send</button></p>

            <?php endif; ?>
        </form>

        <?php endif; ?>
    </div>
    <!-- Leave a Comment Block ----------------------------------------------- -->

</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>