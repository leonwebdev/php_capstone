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
use \App\Lib\DatabaseLogger;
use \App\Lib\FileLogger;

// ----- LOGGER OBJECT INIT --------------------
// ---------------------------------------------

$databaseLogger = new DatabaseLogger($dbh);
$fileLogger = new FileLogger($fh);

// ----- new User Object to query info ---------
// ---------------------------------------------
$user = new User($dbh);

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
