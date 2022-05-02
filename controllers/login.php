<?php

ob_start();

$title = 'Login';

// Get flash message
$flash = $_SESSION['flash'] ?? [];
unset($_SESSION['flash']);

$errors = $errors ?? [];

if ('POST' === $_SERVER['REQUEST_METHOD']) {

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