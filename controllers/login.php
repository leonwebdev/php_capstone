<?php

ob_start();

$title = 'Login';

// Get flash message
$flash = $_SESSION['flash'] ?? [];
unset($_SESSION['flash']);

$errors = $errors ?? [];

if ('POST' === $_SERVER['REQUEST_METHOD']) {

    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token mismatch');
    }

    /* STEP 1 - VALIDATE ALL FIELDS
   ---------------------------------------------------- */

    require __DIR__ . './../modules/validate_login.php';

    /* STEP 2 -- IF NO ERRORS, REDIRECTE TO PROCESS_LOGIN
    -------------------------------------------------------- */

    if (count($errors) == 0) {

        require __DIR__ . './../modules/process_login.php';
    }
}

view('login', compact('title', 'errors', 'flash'));
