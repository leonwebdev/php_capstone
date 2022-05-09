<?php

ob_start();

$title = "Register";

$errors = $errors ?? [];

if ('POST' === $_SERVER['REQUEST_METHOD']) {

    /* STEP 1 - VALIDATE ALL FIELDS
   ---------------------------------------------------- */

    require __DIR__ . './../modules/validate_register.php';

    /* STEP 2 -- IF NO ERRORS, INSERT THEN REDIRECT
    -------------------------------------------------------- */

    if (count($errors) == 0) {

        require __DIR__ . './../modules/process_register.php';
    }


    /* STEP 3 - IF THERE ARE ERRORS, DISPLAY FORM WITH ERRORS
    -------------------------------------------------------- */
}

view('register', compact('title', 'errors'));