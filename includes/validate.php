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
        $errors[$post_key][] = "* " . $label . " is required";
    }
}

// First name can contain only valid characters
if (!preg_match('/^[A-z0-9\s\-\,\']{1,255}$/', $_POST['first_name'])) {
    $errors['first_name'][] = 'First name contains invalid characters';
}

// Last name can contain only valid characters
if (!preg_match('/^[A-z0-9\s\-\,\']{1,255}$/', $_POST['last_name'])) {
    $errors['last_name'][] = 'Last name contains invalid characters';
}

// Street can contain only valid characters
if (!preg_match('/^[A-z0-9\s\-\,\'\\\_\(\)\/\#]{1,255}$/', $_POST['street'])) {
    $errors['street'][] = 'Street contains invalid characters';
}

// City can contain only valid characters
if (!preg_match('/^[A-z0-9\s\-\,\'\_]{1,255}$/', $_POST['city'])) {
    $errors['city'][] = 'City contains invalid characters';
}

// Postal Code can contain only valid characters
if (!preg_match('/^[A-z0-9\s\-\,\']{1,255}$/', $_POST['postal_code'])) {
    $errors['postal_code'][] = 'Postal Code contains invalid characters';
}

// Province can contain only valid characters
if (!preg_match('/^[A-z0-9\s\-\,\'\_]{1,255}$/', $_POST['province'])) {
    $errors['province'][] = 'Province contains invalid characters';
}

// Country can contain only valid characters
if (!preg_match('/^[A-z0-9\s\-\,\'\_]{1,255}$/', $_POST['country'])) {
    $errors['country'][] = 'Country contains invalid characters';
}

// Phone can contain only valid characters
if (!preg_match('/^[A-z0-9\s\-\,\']{1,255}$/', $_POST['phone'])) {
    $errors['phone'][] = 'Phone contains invalid characters';
}

// Email must be valid
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'][] = 'Email must be a valid email';
}

// Password can contain only valid characters
if (!preg_match('/^[A-z0-9\s\-\,\']{1,255}$/', $_POST['password'])) {
    $errors['password'][] = 'Password contains invalid characters';
}