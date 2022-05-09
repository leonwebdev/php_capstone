<?php include __DIR__ . '/inc/header.inc.php'; ?>

<div class="main_wrapper">
    <h1><?= e($title) ?></h1>

    <div class="flex-container pd1 category_list">
        <div>
            <div class="post_category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a">category1</a></div>
            <div class="post_category active-category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a">category2</a></div>
            <div class="post_category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a">category3</a></div>
            <div class="post_category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a">category4</a></div>
            <div class="post_category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a">category5</a></div>
        </div>
        <div>
            <form action="/" method="get" autocomplete="off" novalidate>
                <div>
                    <input type="hidden" name="p" id="" value="post">
                    <input id="search" type="text" name="search" maxlength="255" />
                    <button type="submit" class="rm-btn-margin btn-w-fix btn-p-small ml-1">Search</button>
                </div>
            </form>
        </div>
    </div>
    <!--category list-->

    <div class=" flex-container pd1 post_list">
        <?php foreach ($post_details as $post_detail) : ?>
            <div class="post_card s-box">
                <div><a href="/?p=post&postid=<?= esc_attr($post_detail['id']); ?>">
                        <img src="images/posts/<?= esc_attr($post_detail['image']); ?>" alt="post" class="img-auto-width">
                    </a>
                </div>
                <div class="pd1">
                    <div class="post-card-2-row flex-container">
                        <div><?= esc(formatDateTime($post_detail['published_at'])); ?></div>
                        <div>Leon</div>
                    </div>
                    <div class=" mt1">
                        <a href="/?p=post&postid=<?= esc_attr($post_detail['id']); ?>" class="plain_a post_card_a post_title"><?= esc($post_detail['title']); ?></a>
                    </div>
                    <div class="post_summary mt1"><?= esc($post_detail['summary']); ?></div>
                    <div class="post_category mt1">
                        <a href="/?p=post&categoryid=" class="plain_a cat_list_a">category</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
    <!--All post list view-->
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>