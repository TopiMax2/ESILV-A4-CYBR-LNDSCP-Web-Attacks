<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['memberid'])) {
    header("Location: ../index.php");
    exit();
}

$memberid = $_GET['memberid'];

// Retrieve member information based on the memberid
$query = "SELECT * FROM members WHERE id='$memberid'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $info = $row['info'];
} else {
    echo "Member not found.";
    exit();
}
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
        <h1>IDOR Demo</h1>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="../XSS/xss.html">XSS</a></li>
                <li><a href="../SQLI/SQLI.html">SQL Injection</a></li>
                <li><a href="../CSRF/csrf.html">CSRF</a></li>
                <li><a href="../LFI/LFI.php">LFI</a></li>
                <li><a href="IDOR.html">IDOR</a></li>
                <!-- Add more links for other vulnerabilities -->
            </ul>
        </nav>
    </header>

    <h2>Welcome, <?php echo $username; ?>!</h2>
    <p>Member ID: <?php echo $memberid; ?></p>
    <p>Info: <?php echo $info; ?></p>
    <p>Little tip : I wonder what happens if I try to input other peoples memberID in the URL ?</p>
    <form action="logout.php" method="get">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
