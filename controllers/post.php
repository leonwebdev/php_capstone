<?php

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;

$title = 'Post';

// Get flash message
$flash = $_SESSION['flash'] ?? [];
unset($_SESSION['flash']);

$errors = $errors ?? [];

$cat = new Category($dbh);
$cmt = new Comment($dbh);

$categories = $cat->getAll();

if (!empty($_GET['postid'])) {

    // new a post object
    $post = new Post($dbh);

    $post_detail = $post->getOne($_GET['postid']);

    $total_of_posts = count($post->getAll());

    $all_hidden_and_draft_post_ids = $post->getAllHiddenAndDraftPostIds();

    $all_deleted_post_ids = $post->getAllDeletedPostIds();

    if (in_array($_GET['postid'], $all_deleted_post_ids)) {

        $_SESSION['flash']['error'] = 'Sorry, this page is deleted!';
        header('Location:/?p=profile');
        die;
    }

    if (in_array($_GET['postid'], $all_hidden_and_draft_post_ids)) {

        // ----- Detect if user has logged in as Admin
        // --------------------------------------------
        $user_to_detect = $_SESSION['user_id'] ?? '';
        if (!isAdmin($user, $user_to_detect)) {
            $_SESSION['flash']['error'] = 'Sorry, you must login as an Admin to view this page!';
            header('Location:/?p=login');
            die;
        }
    }


    $all_hidden_and_draft_post_ids[] = $_GET['postid'];

    $except = array_merge($all_hidden_and_draft_post_ids, $all_deleted_post_ids);

    $three_random_num = getRandom3NumExceptThese(1, $total_of_posts, $except);

    $comments = $cmt->getCommentByPostid($post_detail['id']);

    if ('POST' === $_SERVER['REQUEST_METHOD']) {

        if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            die('CSRF token mismatch');
        }

        /* STEP 1 - VALIDATE ALL FIELDS
       ---------------------------------------------------- */

        require __DIR__ . './../modules/validate_comment.php';

        /* STEP 2 -- IF NO ERRORS, REDIRECTE TO User Profile
        -------------------------------------------------------- */

        if (
            count($errors) == 0
        ) {

            require __DIR__ . './../modules/process_comment.php';
        }
    }

    view(
        'post_detail',
        compact('title', 'errors', 'post_detail', 'comments', 'user', 'post', 'categories', 'three_random_num')
    );
} elseif (!empty($_GET['categoryid'])) {

    // new a posts object
    $posts = new Post($dbh);

    $post_details = $posts->getAllByCategoryId($_GET['categoryid']);

    $current_cat_id = $_GET['categoryid'] ?? '';

    view('post', compact('title', 'post_details', 'categories', 'current_cat_id', 'cat', 'user'));
} elseif (!empty($_GET['authorid'])) {

    // new a posts object
    $posts = new Post($dbh);

    $post_details = $posts->getAllByAuthorId($_GET['authorid']);

    $current_cat_id = $_GET['categoryid'] ?? '';

    view('post', compact('title', 'post_details', 'categories', 'current_cat_id', 'cat', 'user'));
} elseif (!empty($_GET['search'])) {

    // new a posts object
    $posts = new Post($dbh);

    $post_details = $posts->getAllBySearch($_GET['search']);

    $current_cat_id = $_GET['categoryid'] ?? '';

    view('post', compact('title', 'post_details', 'categories', 'current_cat_id', 'cat', 'user'));

} else {

    // new a posts object
    $posts = new Post($dbh);

    $post_details = $posts->getAll();

    $current_cat_id = $_GET['categoryid'] ?? '';

    view('post', compact('title', 'post_details', 'categories', 'current_cat_id', 'cat', 'user'));
}