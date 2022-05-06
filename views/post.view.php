<?php include __DIR__ . '/inc/header.inc.php'; ?>

<div class="main_wrapper">
    <h1><?= e($title) ?></h1>

    <div class="flex-container pd1 category_list">
        <div>
            <div class="post_category">category1</div>
            <div class="post_category active-category">category2</div>
            <div class="post_category">category3</div>
            <div class="post_category">category4</div>
            <div class="post_category">category5</div>
        </div>
        <div>
            <form action="" method="get" autocomplete="off" novalidate>
                <div>
                    <input id="search" type="text" name="search" maxlength="255" />
                    <button type="submit" class="rm-btn-margin btn-w-fix btn-p-small ml-1">Search</button>
                </div>
            </form>
        </div>
    </div>
    <!--category list-->

    <div class=" flex-container pd1 post_list">
        <div class="post_card s-box">
            <div><img src="images/posts/1.jpg" alt="post" class="img-auto-width"></div>
            <div class="pd1">
                <div class="post-card-2-row flex-container">
                    <div>Post date</div>
                    <div>post author</div>
                </div>
                <div class="post_title mt1">Post title</div>
                <div class="post_summary mt1">post summary</div>
                <div class="post_category mt1">post category</div>
            </div>
        </div>
        <div class="post_card s-box">
            <div><img src="images/posts/1.jpg" alt="post" class="img-auto-width"></div>
            <div class="pd1">
                <div class="post-card-2-row flex-container">
                    <div>Post date</div>
                    <div>post author</div>
                </div>
                <div class="post_title mt1">Post title</div>
                <div class="post_summary mt1">post summary</div>
                <div class="post_category mt1">post category</div>
            </div>
        </div>
        <div class="post_card s-box">
            <div><img src="images/posts/1.jpg" alt="post" class="img-auto-width"></div>
            <div class="pd1">
                <div class="post-card-2-row flex-container">
                    <div>Post date</div>
                    <div>post author</div>
                </div>
                <div class="post_title mt1">Post title</div>
                <div class="post_summary mt1">post summary</div>
                <div class="post_category mt1">post category</div>
            </div>
        </div>
        <div class="post_card s-box">
            <div><img src="images/posts/1.jpg" alt="post" class="img-auto-width"></div>
            <div class="pd1">
                <div class="post-card-2-row flex-container">
                    <div>Post date</div>
                    <div>post author</div>
                </div>
                <div class="post_title mt1">Post title</div>
                <div class="post_summary mt1">post summary</div>
                <div class="post_category mt1">post category</div>
            </div>
        </div>
        <div class="post_card s-box">
            <div><img src="images/posts/1.jpg" alt="post" class="img-auto-width"></div>
            <div class="pd1">
                <div class="post-card-2-row flex-container">
                    <div>Post date</div>
                    <div>post author</div>
                </div>
                <div class="post_title mt1">Post title</div>
                <div class="post_summary mt1">post summary</div>
                <div class="post_category mt1">post category</div>
            </div>
        </div>
        <div class="post_card s-box">
            <div><img src="images/posts/1.jpg" alt="post" class="img-auto-width"></div>
            <div class="pd1">
                <div class="post-card-2-row flex-container">
                    <div>Post date</div>
                    <div>post author</div>
                </div>
                <div class="post_title mt1">Post title</div>
                <div class="post_summary mt1">post summary</div>
                <div class="post_category mt1">post category</div>
            </div>
        </div>
        <div class="post_card s-box">
            <div><img src="images/posts/1.jpg" alt="post" class="img-auto-width"></div>
            <div class="pd1">
                <div class="post-card-2-row flex-container">
                    <div>Post date</div>
                    <div>post author</div>
                </div>
                <div class="post_title mt1">Post title</div>
                <div class="post_summary mt1">post summary</div>
                <div class="post_category mt1">post category</div>
            </div>
        </div>

    </div>
    <!--All post list view-->
</div>

<?php include __DIR__ . '/inc/footer.inc.php'; ?>