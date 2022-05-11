<?php
// ----- SESSION START ------------------------
// --------------------------------------------

session_start();
ob_start();

// ----- REQUIRE ------------------------------
// --------------------------------------------

require __DIR__ . '/../../../config/functions.php';
require __DIR__ . '/../../../config/connect.php';
require __DIR__ . '/../../../config/escape.php';
require __DIR__ . '/../../../vendor/autoload.php';

// ----- USE -----------------------------------
// ---------------------------------------------
use \App\Models\User;
use \App\Models\Post;
use \App\Models\Category;
use \App\Models\Comment;
use \App\Models\DatabaseQuery;
use \App\Models\Validator;
use \App\Lib\DatabaseLogger;
use \App\Lib\FileLogger;

// ----- LOGGER OBJECT INIT --------------------
// ---------------------------------------------

$databaseLogger = new DatabaseLogger($dbh);
$fileLogger = new FileLogger($fh);

// ----- new User Object to query info ---------
// ---------------------------------------------
$user = new User($dbh);
$posts = new Post($dbh);
$cat = new Category($dbh);
$cmt = new Comment($dbh);

// ----- Get flash message ---------------------
// ---------------------------------------------
$flash = $_SESSION['flash'] ?? [];
unset($_SESSION['flash']);

// ----- Get errors ---------------------
// ---------------------------------------------
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);

// ----- Detect if user has logged in as Admin
// --------------------------------------------
$user_to_detect = $_SESSION['user_id'] ?? '';
if (!isAdmin($user, $user_to_detect)) {
    $_SESSION['flash']['error'] = 'Sorry, you must login as an Admin to view this page!';
    header('Location:/?p=login');
    die;
}

session_regenerate_id();