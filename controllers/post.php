<?php

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;

$title = 'Post';

$cat = new Category($dbh);
$cmt = new Comment($dbh);

$categories = $cat->getAll();

if (!empty($_GET['postid'])) {

    // new a post object
    $post = new Post($dbh);

    $post_detail = $post->getOne($_GET['postid']);

    $comments = $cmt->getCommentByPostid($post_detail['id']);

    view(
        'post_detail',
        compact('title', 'post_detail', 'comments', 'user', 'categories')
    );
} else {

    // new a posts object
    $posts = new Post($dbh);

    $post_details = $posts->getAll();

    $current_cat_id = $_GET['categoryid'] ?? '';

    view('post', compact('title', 'post_details', 'categories', 'current_cat_id'));
}