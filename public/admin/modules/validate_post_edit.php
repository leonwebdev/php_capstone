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
$validate_post_edit = new Validator($_POST, $_FILES);

// The following fields are required
$required = ['title', 'summary', 'content', 'authorid', 'categoryid', 'status'];
$validate_post_edit->validateRequired($required);

// Title must be valid
$validate_post_edit->validateString('title');
$validate_post_edit->validateMinLength(3, 'title');
$validate_post_edit->validateMaxLength(255, 'title');

// Summary must be valid
$validate_post_edit->validateMinLength(3, 'summary');
$validate_post_edit->validateMaxLength(255, 'summary');

// Image must be valid
$validate_post_edit->validateImage('image');

// Get All errors
$errors = $validate_post_edit->getErrors();