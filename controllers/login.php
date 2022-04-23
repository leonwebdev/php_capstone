<?php

ob_start();

$title = 'Login';

$errors = $errors ?? [];

if ('POST' === $_SERVER['REQUEST_METHOD']) {

    /* STEP 1 - VALIDATE ALL FIELDS
   ---------------------------------------------------- */

    require __DIR__ . './../models/validate.php';

    // consolelog($errors);
    // consolelog($_SESSION['register_form_errors']);


    /* STEP 2 -- IF NO ERRORS, REDIRECTE TO PROCESS_LOGIN
    -------------------------------------------------------- */

    if (count($errors) == 0) {
    }
}

view('login', compact('title', 'errors'));