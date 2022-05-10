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
} elseif (!empty($_GET['categoryid'])) {

    // new a posts object
    $posts = new Post($dbh);

    $post_details = $posts->getAllByCategoryId($_GET['categoryid']);

    $current_cat_id = $_GET['categoryid'] ?? '';

    view('post', compact('title', 'post_details', 'categories', 'current_cat_id', 'cat'));
} elseif (!empty($_GET['search'])) {

    // new a posts object
    $posts = new Post($dbh);

    $post_details = $posts->getAllBySearch($_GET['search']);
    // dd($post_details);
    $current_cat_id = $_GET['categoryid'] ?? '';

    view('post', compact('title', 'post_details', 'categories', 'current_cat_id', 'cat'));

} else {

    // new a posts object
    $posts = new Post($dbh);

    $post_details = $posts->getAll();

    $current_cat_id = $_GET['categoryid'] ?? '';

    view('post', compact('title', 'post_details', 'categories', 'current_cat_id', 'cat'));
}