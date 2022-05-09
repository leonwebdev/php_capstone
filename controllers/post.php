<?php

use App\Models\Post;

$title = 'Post';

if (!empty($_GET['postid'])) {

    // new a post object

    $post = new Post($dbh);

    $post_detail = $post->getOne($_GET['postid']);

    $org_date = $post_detail['published_at'];

    $post_date = date(
        'Y-M-j',
        strtotime($org_date)
    );

    view(
        'post_detail',
        compact('title', 'post_detail', 'post_date')
    );
} else {
    view('post', compact('title'));
}