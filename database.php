<?php
if (session_status() == PHP_SESSION_NONE) {
    // Configure timeout to 15 minutes
    $timeout = 31536000;

    // Set the maxlifetime of session
    ini_set("session.gc_maxlifetime", $timeout);

    // Also set the session cookie timeout
    ini_set("session.cookie_lifetime", $timeout);

    // each client should remember their session id for EXACTLY 1 year
    session_set_cookie_params($timeout);

    // Now start the session 
    session_start();
}
/**
 * Change these details according to your server
 */
$server = "localhost";
$username = "root";
$password = "";
$database = "db";
$port = 3306;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    //Username, Password and Database
    $con = new mysqli($server, $username, $password, $database, $port);
    $con->set_charset("utf8mb4");
} catch (Exception $e) {
       echo $e->getMessage();
    //Should be a message a typical user could understand
}