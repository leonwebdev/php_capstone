<?php include __DIR__ . '/inc/header.inc.php'; ?>

<div class="main_wrapper">
    <h1><?= e($title) ?></h1>

    <div class="flex-container pd1">
        <div class="post_category">category1</div>
    </div>
    <!--category list-->

    <div class=" flex-container pd1">
        <div class="post_card s-box">
            <div><img src="images/posts/1.jpg" alt="post" class="img-auto-width"></div>
            <div class="post-card-2-row flex-container mt1">
                <div>Post date</div>
                <div>post author</div>
            </div>
            <div class="post_title mt1">post title</div>
            <div class="post_summary mt1">post summary</div>
            <div class="post_category mt1">post category</div>
        </div>
    </div>
    <!--All post list view-->
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>