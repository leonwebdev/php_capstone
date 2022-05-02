<?php

// Trim spaces from around all values
foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}

// The following fields are required
$required = ['first_name', 'last_name', 'street', 'city', 'postal_code', 'province', 'country', 'phone', 'email', 'password', 'password_confirm'];

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
if (!preg_match('/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/', $_POST['postal_code'])) {
    $errors['postal_code'][] = 'Postal Code must be like A2A 2A2';
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
if (!preg_match('/^[\(]?[0-9]{3}[\-\)\ \.]?[0-9]{3}[\-\ \.]?[0-9]{4}$/', $_POST['phone'])) {
    $errors['phone'][] = 'Phone must be like 123-123-1234';
}

// Email must be valid
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'][] = 'Email must be a legal email';
}

// Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.
$password_to_validate = $_POST['password'];

// Validate password
$uppercase    = preg_match('/[A-Z]/', $password_to_validate);
$lowercase    = preg_match('/[a-z]/', $password_to_validate);
$number       = preg_match('/[0-9]/', $password_to_validate);
$specialChars = preg_match('/[\W]/', $password_to_validate);

if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password_to_validate) < 8) {
    $errors['password'][] = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
}

// Confirm password
if ($_POST["password"] !== $_POST["password_confirm"]) {
    $errors['password_confirm'][] = 'Please input the same password again';
}

// echo '<pre>';
// echo print_r($_POST);
// echo print_r($errors);
// echo '</pre>';