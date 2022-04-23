<?php

ob_start();

// Trim spaces from around all values
foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}

// The following fields are required
$required = ['email', 'password'];

// All fields are required
foreach ($required as $post_key) {
    if (empty($_POST[$post_key])) {
        $label = ucwords(str_replace('_', ' ', $post_key));
        $errors[$post_key][] = "* " . $label . " is required";
    }
}

// Email must be valid
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'][] = 'Email must be a legal email';
}