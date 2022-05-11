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

// ----- SET PAGE TITLE ------------------------
// ---------------------------------------------

$title = 'Dashboard | Administration';

// ----- Get flash message ---------------------
// ---------------------------------------------
$flash = $_SESSION['flash'] ?? [];
unset($_SESSION['flash']);

/*--------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------*/

/*-----------             ACTUAL CODE IN THIS PAGE              ------------*/

/*--------------------------------------------------------------------------*/
/*--------------------------------------------------------------------------*/

// ----- Get recent ten log entries --------------------
// ---------------------------------------------

$recent_ten_log_entries = $databaseLogger->getRecentTenEntries();

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title); ?></title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container col-12">
            <a class="navbar-brand flex-grow-1" href="#">Gardener Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Posts</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Comments</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Users</a></li>
                    <li class="nav-item"><a class="nav-link fw-bold text-danger" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content container mt-5 mb-5">

        <?php if (!empty($flash['success'])) : ?>
        <div class="alert alert-success">
            <?= esc($flash['success']) ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($flash['error'])) : ?>
        <div class="alert alert-danger">
            <?= esc($flash['error']) ?>
        </div>
        <?php endif; ?>

        <div class="row">
            <h1 class="mb-5"><?= esc($title); ?></h1>
            <div class="main col-12">
                <h2>Recent Log Entries</h2>

                <table id="log" class="table table-striped table-bordered">
                    <tr>
                        <th>date/time | http status | request method | request URI | User Browser Info</th>
                    </tr>
                    <?php foreach ($recent_ten_log_entries as $key => $value) : ?>
                    <tr>
                        <td>
                            <small><?= esc($value['event']) ?></small>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

    <div class="footer text-center py-5 text-white bg-dark">
        <p class="my-3">&copy; 2021-2022. Lihang Yao. MB R3B 0E3</p>
    </div>

</body>

</html>