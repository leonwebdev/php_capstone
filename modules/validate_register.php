<?php

ob_start();

use \App\Models\Validator;

// Trim spaces from around all values
foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}

// new Validate Object
$validate_register = new Validator($_POST);

// The following fields are required
$required = ['first_name', 'last_name', 'street', 'city', 'postal_code', 'province', 'country', 'phone', 'email', 'password', 'password_confirm'];
$validate_register->validateRequired($required);

$normal_field =
    ['first_name', 'last_name', 'street', 'city', 'province', 'country'];

foreach ($normal_field as $key => $value) {

    $validate_register->validateMaxLength(255, $value);
    $validate_register->validateMinLength(3, $value);
    $validate_register->validateString($value);
}

$validate_register->validatePostalCode('postal_code');
$validate_register->validatePhone('phone');
$validate_register->validateEmail('email');

// Get All errors
$errors = $validate_register->getErrors();

// Email must be unique
if (!isEmailUnique($_POST['email'])) {
    $errors['email'][] = 'Email has existed, please use another email';
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

// consolelog($errors);

// echo '<pre>';
// echo print_r($_POST);
// echo print_r($errors);
// echo '</pre>';