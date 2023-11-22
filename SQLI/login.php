<?php

// Simulated authentication logic (vulnerable to SQL injection)
define('DB_HOST', 'db');
define('DB_NAME', 'school_project');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Redirect to another page upon successful login
    include("adminpage.html");
    exit();
} else {
    echo "Login failed";
}

$conn->close();
?>


