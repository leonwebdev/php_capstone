<?php

// Trim spaces from around all values
foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}

// The following fields are required
$required = ['id', 'first_name', 'last_name', 'street', 'city', 'postal_code', 'province', 'country', 'phone', 'email', 'password', 'password_confirm', 'subscribe_to_newsletter'];

// All fields are required
foreach ($required as $post_key) {
    if (empty($_POST[$post_key])) {
        $label = ucwords(str_replace('_', ' ', $post_key));
        $errors[$post_key][] = $label . " is required";
    }
}

// First name can contain only valid characters
if (!preg_match('/^[A-z0-9\s\-\,\']{1,32}$/', $_POST['first_name'])) {
    $errors['first_name'][] = 'First name contains invalid characters';
}

// Email must be valid
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'][] = 'Email must be a valid email';
}