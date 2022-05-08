<?php include __DIR__ . '/inc/header.inc.php'; ?>

<div class="main_wrapper">

    <div class="post_hero_pic">
        <img src="./images/posts/1.jpg" class="img-auto-width post_hero_pic">
    </div>
    <p style="margin-top: 0.2rem;color:#84878b;">
        - Summary of this post will display here bla bla bla.
    </p>

    <h1 style="margin-top: 2.5rem;">Post Title</h1>
    <div class="flex-container">
        <div class="mr1 post_detail_2_row border-r-1 pr-1">Author Name</div>
        <div class="mr1 post_detail_2_row border-r-1 pr-1">Post Date</div>
        <div class="mr1 post_detail_2_row ">2 Comments</div>
    </div>
    <div class="post_content">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae
            ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis
            consequatur quibusdam!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste minima esse aspernatur modi, dolorem molestiae
            ullam error veritatis! Consectetur, consequatur. Esse dolores animi modi veritatis sed nihil debitis
            consequatur quibusdam!</p>
    </div>
    <div class="flex-container post_detail_recommand_block">
        <?php for ($i = 0; $i < 3; $i++) : ?>
        <div class="pd1 post_recommend_card">
            <div>
                <a href="/?p=post&postid=<?= esc_attr($i + 1); ?>"
                    class="plain_a post_card_a fw-700 recmd_artical_title">More
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
            <div class="post_category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a">category1</a></div>
            <div class="post_category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a">category2</a></div>
            <div class="post_category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a">category3</a></div>
            <div class="post_category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a">category4</a></div>
            <div class="post_category"><a href="/?p=post&categoryid=" class="plain_a cat_list_a">category5</a></div>
        </div>
    </div>
    <div id="comment_exhibition">
        <?php for ($i = 0; $i < 3; $i++) : ?>
        <div class="cmt-card flex-container">
            <div><img class="cmt-pic" src="images/profile_of_comment.jpeg"></div>
            <div>
                <div class="flex-container">
                    <div class="mr1 border-r-1 pr-1 fw-700">User Name</div>
                    <div class="mr1 post_detail_2_row pr-1"><small>March 23</small></div>
                </div>
                <div class="mt1">Lorem ipsum dolor sit amet consectetur adipisicing elit.</div>
            </div>
        </div>
        <?php endfor; ?>
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