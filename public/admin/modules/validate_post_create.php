<?php

ob_start();

use \App\Models\Validator;

// Trim spaces from around all values
foreach ($_POST as $key => $value) {
    $_POST[$key] = trim($value);
}
// var_dump($_FILES);
// dd($_POST);
// new Validate Object
$validate_post_create = new Validator($_POST);
$validate_post_create_img = new Validator($_FILES);

// The following fields are required
$required = ['title', 'summary', 'content', 'authorid', 'categoryid', 'status'];
$validate_post_create->validateRequired($required);

// Title must be valid
$validate_post_create->validateString('title');
$validate_post_create->validateMinLength(3, 'title');
$validate_post_create->validateMaxLength(255, 'title');

// Summary must be valid
$validate_post_create->validateString('summary');
$validate_post_create->validateMinLength(3, 'summary');
$validate_post_create->validateMaxLength(255, 'summary');

// Get All errors
$errors = $validate_post_create->getErrors();