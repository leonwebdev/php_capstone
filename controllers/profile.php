<?php

use App\Models\Comment;
use App\Models\Post;

$cmt = new Comment($dbh);
$post = new Post($dbh);

$title = "Profile";

// Get flash message
$flash = $_SESSION['flash'] ?? [];
unset($_SESSION['flash']);

if ($_SESSION['user_id']) {

    $results = $user->getOne($_SESSION['user_id']);

    $cmt_details = $cmt->getCommentsByUserid($_SESSION['user_id']);

} else {

    $_SESSION['flash']['error'] = 'Sorry, you must login to view this page.';
    header('Location:/?p=login');
    die;
}

view('profile', compact('title', 'results', 'flash', 'cmt_details', 'post'));