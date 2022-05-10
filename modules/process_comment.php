<?php

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    die('405 - Unsupported Request Method');
}

// Insert New Comment into Database

if (/* insert new comment failed */ ) {

    $_SESSION['flash']['error'] = 'Sorry, no user found or wrong password, please try again.';
    header('Location:/?p=login');
    die;
}

session_regenerate_id();
$_SESSION['flash']['success'] = 'Welcome! ' . $user_try_to_login['first_name'] . ' ' . $user_try_to_login['last_name'] . ', you are logged in!';
$_SESSION['user_id'] = $user_try_to_login['id'];
header('Location:/?p=profile');
die;