<?php
// Simulated authentication logic (vulnerable to SQL injection)
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "sqli_data";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);

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


