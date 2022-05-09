<?php

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    die('405 - Unsupported Request Method');
}

$id = $user->create($_POST);

if ($id) {

    $_SESSION['user_id'] = $id;
    $_SESSION['flash']['success'] = 'Congrats! Register success!!!';

    header("Location: /?p=profile");
    die;
} else {
    die('<h1>There was a problem inserting the user.</h1>');
}
