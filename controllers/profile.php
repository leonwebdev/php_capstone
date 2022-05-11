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

    if ('POST' === $_SERVER['REQUEST_METHOD']) {

        /* STEP 1 - Delete this record in comments table in database */
        $result_delete = $cmt->delete($_POST['comment_id']);

        /* STEP 2 -- If delete success, REDIRECTE TO User Profile */
        if ('Record has been deleted' === $result_delete) {

            session_regenerate_id();
            $_SESSION['flash']['success'] = 'Delete this comment successfully!';
            header('Location:/?p=profile');
            die;
        }
    }

} else {

    $_SESSION['flash']['error'] = 'Sorry, you must login to view this page.';
    header('Location:/?p=login');
    die;
}

view('profile', compact('title', 'results', 'flash', 'cmt_details', 'post'));