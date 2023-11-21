<?php
$servername = "db";
$username = "user";
$password = "password";
$dbname = "school_project";

define('DB_HOST', 'db');
define('DB_NAME', 'school_project');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>