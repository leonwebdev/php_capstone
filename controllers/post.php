<?php

$title = 'Post';

if (!empty($_GET['postid'])) {
    view('post_detail', compact('title'));
} else {
    view('post', compact('title'));
}