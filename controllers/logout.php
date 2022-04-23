<?php

ob_start();

$title = 'Logout';

// Get flash message
$flash = $_SESSION['flash'] ?? [];
unset($_SESSION['flash']);