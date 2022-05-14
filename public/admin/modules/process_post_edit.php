<?php

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    die('405 - Unsupported Request Method');
}

$tmp_name = $_FILES['image']['tmp_name'] ?? '';

if (!$tmp_name) {

    $file_name = $_POST['image'];
} else {
    $file_name = uniqid() . '_' . $_FILES['image']['name'];
    $save_path = __DIR__ . '/../../images/posts/' . $file_name;
    move_uploaded_file($tmp_name, $save_path);
    $_POST['image'] = $file_name;
}

$result = $posts->update($_POST, $_GET['id']);

if (!$result) {

    $_SESSION['flash']['error'] = 'Sorry, failed to update this post. Please try again.';
    header('Location:/admin/edit_post.php');
    die;
}

session_regenerate_id();

$_SESSION['flash']['success'] = 'Congrats! You update this post successfully!';
header('Location:/admin/posts.php');
die;