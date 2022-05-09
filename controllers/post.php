<?php

use App\Models\Post;

$title = 'Post';

if (!empty($_GET['postid'])) {

    // new a post object
    $post = new Post($dbh);

    $post_detail = $post->getOne($_GET['postid']);

    view(
        'post_detail',
        compact('title', 'post_detail')
    );
} else {

    // new a posts object
    $posts = new Post($dbh);

    $post_details = $posts->getAll();

    view('post', compact('title', 'post_details'));
}