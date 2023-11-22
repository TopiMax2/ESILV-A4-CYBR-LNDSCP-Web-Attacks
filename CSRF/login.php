<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $username = $_GET["username"];
    $password = $_GET["password"];

    // Validate user credentials (you should use hashing in a real-world scenario)
    // For simplicity, we'll assume the password is stored as plaintext in the database.
    
    define('DB_HOST', 'db');
    define('DB_NAME', 'school_project');
    define('DB_USER', 'user');
    define('DB_PASSWORD', 'password');
    
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, username, password FROM bank_users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($password == $row["password"]) {
            // Set user session
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];

            // Redirect to the bank account page
            header("Location: account.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }

    $conn->close();
}
?>