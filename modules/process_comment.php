<?php

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    die('405 - Unsupported Request Method');
}

// Insert New Comment into Database
$last_insrt_id = $cmt->create($_GET['postid'], $_SESSION['user_id'], $_POST['content']) ?? null;

if (!$last_insrt_id) {

    $_SESSION['flash']['error'] = 'Sorry, failed to leave this comment. Please try again.';
    header('Location:/?p=profile');
    die;
}

session_regenerate_id();
$_SESSION['flash']['success'] = 'Congrats! You left a new comment successfully!';
header('Location:/?p=profile');
die;