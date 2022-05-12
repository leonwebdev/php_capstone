<?php

require __DIR__ . '/config/config.php';

$title = 'Logout';

unset($_SESSION['user_id']);

session_regenerate_id();

$_SESSION['flash']['success'] = 'Bye! You have logged out!';
header('Location: /?p=login');
die;