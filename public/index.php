<?php

define('ENV', 'development'); // testing, production, development

// ----- SESSION START ------************
session_start();
ob_start();


require __DIR__ . '/../config/functions.php';
require __DIR__ . '/../config/connect.php';
require __DIR__ . '/../config/escape.php';
// require __DIR__ . '/../models/validate.php';


/* Our Front Controller
---------------------------------- */

// Define allowed routes
$allowed = ['home', 'mine', 'newsletter', 'timeline', 'community', 'register', 'profile', 'login'];

// Figure out what user is requesting
// Figure out if we have that amd if the user is allowed to requrest it

if (empty($_GET['p'])) {
    $page = 'home';
} elseif (in_array($_GET['p'], $allowed)) {
    $page = $_GET['p'];
} else {
    http_response_code(404);
    $page = 'error404';
}

// Load it if we have it (and it's allowed)
// Output 404 error message if we don't have

$path = __DIR__ . '/../controllers/' . $page . '.php';
require($path);
