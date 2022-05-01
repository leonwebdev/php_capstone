<?php

define('ENV', 'development'); // testing, production, development

// ----- SESSION START ------------------------
// --------------------------------------------

session_start();
ob_start();

// ----- REQUIRE ------------------------------
// --------------------------------------------

require __DIR__ . '/../config/functions.php';
require __DIR__ . '/../config/connect.php';
require __DIR__ . '/../config/escape.php';
require __DIR__ . '/../vendor/autoload.php';

// ----- USE -----------------------------------
// ---------------------------------------------

use \App\Lib\DatabaseLogger;
use \App\Lib\FileLogger;

// ----- LOGGER OBJECT INIT --------------------
// ---------------------------------------------

$databaseLogger = new DatabaseLogger($dbh);
$fileLogger = new FileLogger($fh);

/* ----- Front Controller
---------------------------------- */

// Define allowed routes
$allowed = [
    'home', 'mine', 'newsletter', 'timeline', 'community',
    'register', 'profile', 'login', 'logout'
];

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

/* ----- Get The Data Needed to Write A LOG
--------------------------------------------------------------- */

$event = createLogEvent($_SERVER, http_response_code());

/* ----- LOG USER REQUEST everytime user refresh page
--------------------------------------------------------------- */

logEvent($databaseLogger, $event);
logEvent($fileLogger, $event);

require($path);