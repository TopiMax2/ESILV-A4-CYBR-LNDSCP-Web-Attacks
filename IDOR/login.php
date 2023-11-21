<?php
session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get username and password from the URL
    $username = $_GET['username'];
    $password = $_GET['password'];

    // Validate credentials (you should use prepared statements to prevent SQL injection)
    $query = "SELECT * FROM members WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['memberid'] = $row['id'];
        header("Location: profile.php?memberid=" . $row['id']);
        exit();
    } else {
        echo "Invalid login credentials.";
    }
}
?>
