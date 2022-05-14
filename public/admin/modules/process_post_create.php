<?php

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    die('405 - Unsupported Request Method');
}

$tmp_name = $_FILES['image']['tmp_name'];
$file_name = uniqid() . '_' . $_FILES['image']['name'];
$save_path = __DIR__ . '/../../images/posts/' . $file_name;
move_uploaded_file($tmp_name, $save_path);

$_POST['image'] = $file_name;

$last_insert_id = $posts->create($_POST);

if (!$last_insert_id) {

    $_SESSION['flash']['error'] = 'Sorry, failed to create new posts. Please try again.';
    header('Location:/admin/post_create.php');
    die;
}

session_regenerate_id();

$_SESSION['flash']['success'] = 'Congrats! You create a new post successfully!';
header('Location:/admin/posts.php');
die;