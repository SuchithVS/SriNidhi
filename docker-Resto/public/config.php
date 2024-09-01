<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DB_SERVER', 'mysql'); // Use the service name from docker-compose.yml
define('DB_USERNAME', 'user1'); // Use the username from docker-compose.yml
define('DB_PASSWORD', 'passwd'); // Use the password from docker-compose.yml
define('DB_NAME', 'restaurant_management');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error() . " (Error code: " . mysqli_connect_errno() . ")");
}
?>