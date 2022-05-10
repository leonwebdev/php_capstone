<?php include __DIR__ . '/inc/header.inc.php'; ?>

<div class="main_wrapper">
    <h1><?= e($title) ?></h1>

    <div class="flex-container pd1 category_list">
        <div>
            <?php foreach ($categories as $category) : ?>
            <div class="post_category
                <?php if ($category['id'] == $current_cat_id) : ?>
                active-category
                <?php endif; ?>
                ">
                <a href="/?p=post&categoryid=<?= esc_attr($category['id']) ?>" class="plain_a cat_list_a">
                    <?= esc($category['title']); ?>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
        <div>
            <form method="get" autocomplete="off" novalidate>
                <div>
                    <input type="hidden" name="p" id="" value="post">
                    <input id="search" type="text" name="search" maxlength="255"
                        value="<?= esc_attr($_GET['search'] ?? '') ?>" />
                    <button type="submit" class="rm-btn-margin btn-w-fix btn-p-small ml-1">Search</button>
                </div>
            </form>
        </div>
    </div>
    <!--category list-->

    <div class="grid-container grid_post_list post_list">
        <?php foreach ($post_details as $post_detail) : ?>
        <div class="post_card s-box">
            <div><a href="/?p=post&postid=<?= esc_attr($post_detail['id']); ?>">
                    <img src="images/posts/<?= esc_attr($post_detail['image']); ?>" alt="post" class="img-auto-width">
                </a>
            </div>
            <div class="pd1">
                <div class="post-card-2-row flex-container">
                    <div><?= esc(formatDateTime($post_detail['published_at'])); ?></div>
                    <div><?= esc($user->getUserNameByIdRelatingToPost($post_detail['authorid'])); ?></div>
                </div>
                <div class=" mt1">
                    <a href="/?p=post&postid=<?= esc_attr($post_detail['id']); ?>"
                        class="plain_a post_card_a post_title"><?= esc($post_detail['title']); ?></a>
                </div>
                <div class="post_summary mt1"><?= esc($post_detail['summary']); ?></div>
                <div class="post_category mt1">
                    <a href="/?p=post&categoryid=<?= esc_attr($post_detail['categoryid']); ?>"
                        class="plain_a cat_list_a"><?= esc($cat->getCategoryTitleByPostId($post_detail['categoryid'])); ?></a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
    <!--All post list view-->
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>