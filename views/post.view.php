<?php include __DIR__ . '/inc/header.inc.php'; ?>

<div class="main_wrapper">
    <h1><?= e($title) ?></h1>

    <div class="flex-container pd1 category_list">
        <div>
            <div class="post_category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a">category1</a></div>
            <div class="post_category active-category"><a href="/?p=post&categoryid="
                    class="plain_a cat_list_a">category2</a></div>
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
        <?php for ($i = 0; $i < 10; $i++) : ?>
        <div class="post_card s-box">
            <div><a href="/?p=post&postid=<?= esc_attr($i + 1); ?>">
                    <img src="images/posts/1.jpg" alt="post" class="img-auto-width">
                </a>
            </div>
            <div class="pd1">
                <div class="post-card-2-row flex-container">
                    <div>Post date</div>
                    <div>post author</div>
                </div>
                <div class=" mt1">
                    <a href="/?p=post&postid=<?= esc_attr($i + 1); ?>" class="plain_a post_card_a post_title">Post
                        Title</a>
                </div>
                <div class="post_summary mt1">post summary</div>
                <div class="post_category mt1">
                    <a href="/?p=post&categoryid=" class="plain_a cat_list_a">category</a>
                </div>
            </div>
        </div>
        <?php endfor; ?>

    </div>
    <!--All post list view-->
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>