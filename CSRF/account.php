<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: CSRF.html");
    exit();
}

// Connect to the database
define('DB_HOST', 'db');
define('DB_NAME', 'school_project');
define('DB_USER', 'user');
define('DB_PASSWORD', 'password');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user information
$user_id = $_SESSION["user_id"];
$sql = "SELECT id, username, balance FROM bank_users WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found";
    exit();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Web Vulnerability Demos</title>
    <link rel="icon" type="image/png" href="img/thunder.png">
</head>
<body>
    <header>
        <h1>Web Vulnerability Demos</h1>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="../SQLI/SQLI.html">SQL Injection</a></li>
                <li><a href="../XSS/XSS.html">XSS</a></li>
                <li><a href="../IDOR/IDOR.html">IDOR</a></li>
                <li><a href="../CSRF/CSRF.html">CSRF</a></li>
                <li><a href="../LFI/LFI.php">LFI</a></li>
                <!-- Add more links for other vulnerabilities -->
            </ul>
        </nav>
    </header>
<body>
    <h2>Welcome, <?php echo $user["username"]; ?></h2>
    <p>Account Balance: $<?php echo $user["balance"]; ?></p>

    <h3>Transfer Money</h3>
    <form action="transfer.php" method="get">
        <label for="amount">Amount:</label>
        <input type="text" name="amount" required><br>

        <label for="recipient">Recipient Username:</label>
        <input type="text" name="recipient" required><br>

        <input type="submit" value="Transfer">
    </form>
    
    <br>
    <form action="logout.php" method="get">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
