<?php

ob_start();

use \App\Models\Validator;

// Trim spaces from around all values
foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}

// new Validate Object
$validate_cmt = new Validator($_POST);

// The following fields are required
$required = ['content'];
$validate_cmt->validateRequired($required);

// Content length must be valid
$validate_cmt->validateMinLength(3, 'content');
$validate_cmt->validateMaxLength(65535, 'content');

// Get All errors
$errors = $validate_cmt->getErrors();
