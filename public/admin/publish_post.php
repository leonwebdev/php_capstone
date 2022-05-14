<?php

require __DIR__ . '/config/config.php';
// ----- SET PAGE TITLE ------------------------
$title = 'Posts | Administration';

/*--------------------------------------------------------------------------*/

/*-----------             ACTUAL CODE IN THIS PAGE              ------------*/

/*--------------------------------------------------------------------------*/

/* STEP 1 - Delete this record in posts table in database */
$result_publish = $posts->publish($_GET['id']);

/* STEP 2 -- If delete success, REDIRECTE TO Post List */
if ('Record has been published' === $result_publish) {

    session_regenerate_id();
    $_SESSION['flash']['success'] = 'Publish this post successfully!';
    header('Location:/admin/posts.php');
    die;
}