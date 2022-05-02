<?php

ob_start();

use \App\Models\Validator;

// Trim spaces from around all values
foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}

// new Validate Object
$validate_login = new Validator($_POST);

// The following fields are required
$required = ['email', 'password'];
$validate_login->validateRequired($required);

// Email must be valid
$validate_login->validateEmail('email');

// Get All errors
$errors = $validate_login->getErrors();