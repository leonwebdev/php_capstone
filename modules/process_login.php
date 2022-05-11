<?php

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    die('405 - Unsupported Request Method');
}

$user_try_to_login = $user->getOneByEmail('email', $_POST['email']);

if (!$user_try_to_login || !password_verify($_POST['password'], $user_try_to_login['password'])) {

    $_SESSION['flash']['error'] = 'Sorry, no user found or wrong password, please try again.';
    header('Location:/?p=login');
    die;
}

// Regenerate session id and set $_SESSION['user_id']
session_regenerate_id();
$_SESSION['user_id'] = $user_try_to_login['id'];

// Detect if isAdmin
if (isAdmin($user, $_SESSION['user_id'])) {

    // 1. If isAdmin, redirect to Dashboard Administration
    $_SESSION['flash']['success'] = 'Welcome to Dashboard! ' . $user_try_to_login['first_name'] . ' ' . $user_try_to_login['last_name'] . ', you are logged in as Administrative!';
    header('Location:/admin/index.php');
    die;

} else {

    // 2. If isnot Admin, redirect to normal user profile
    $_SESSION['flash']['success'] = 'Welcome! ' . $user_try_to_login['first_name'] . ' ' . $user_try_to_login['last_name'] . ', you are logged in!';
    header('Location:/?p=profile');
    die;
}
