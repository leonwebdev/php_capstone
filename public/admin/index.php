<?php

// ----- SESSION START ------------------------
// --------------------------------------------

session_start();
ob_start();

// ----- REQUIRE ------------------------------
// --------------------------------------------

require __DIR__ . '/../../config/functions.php';
require __DIR__ . '/../../config/connect.php';
require __DIR__ . '/../../config/escape.php';
require __DIR__ . '/../../vendor/autoload.php';

// ----- USE -----------------------------------
// ---------------------------------------------

use \App\Lib\DatabaseLogger;
use \App\Lib\FileLogger;

// ----- LOGGER OBJECT INIT --------------------
// ---------------------------------------------

$databaseLogger = new DatabaseLogger($dbh);
$fileLogger = new FileLogger($fh);

// ----- SET PAGE TITLE --------------------
// ---------------------------------------------

$title = 'Dashboard | Administration';

            // ----- Get recent ten log entries --------------------
            // ---------------------------------------------

            $recent_ten_log_entries = $databaseLogger->getRecentTenEntries();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <style>
    /* .row div {
        border: 1px solid #cfcfcf;
    } */
    </style>
</head>

<body>

    <nav class="navbar navbar-expand navbar-dark bg-black">
        <div class="container">
            <a class="navbar-brand" href="#">Gardener Admin</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Posts</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Comments</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
            </ul>
        </div>
    </nav>

    <div class="content container mt-5 mb-5">

        <div class="row">

            <div class="main col-10">
                <h1>Recent Log Entries</h1>
            </div>

        </div>

    </div>

    <div class="container">
        <hr>
        <div class="row">
            <div class="footer col text-center pt-4 pb-2">
                <p>&copy; 2021-2022. Lihang Yao. MB R3B 0E3</p>
            </div>
        </div>
    </div>

</body>

</html>