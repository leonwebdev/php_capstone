<?php

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    http_response_code(405);
    die('405 - Unsupported Request Method');
}

$tmp_name = $_FILES['image']['tmp_name'];
$file_name = uniqid() . '_' . $_FILES['image']['name'];
$save_path = __DIR__ . '/../../images/posts/' . $file_name;
move_uploaded_file($tmp_name, $save_path);
die;