<?php

// ----- SESSION START ------------------------
// --------------------------------------------

session_start();
ob_start();

if(empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] =  md5( uniqid( mt_rand(), true) );
}
