<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $amount = $_GET["amount"];
    $recipient = $_GET["recipient"];

    // Connect to the database
    define('DB_HOST', 'db');
    define('DB_NAME', 'school_project');
    define('DB_USER', 'user');
    define('DB_PASSWORD', 'password');
    
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, 3306);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get sender information
    $sender_id = $_SESSION["user_id"];
    $sql_sender = "SELECT id, balance FROM bank_users WHERE id = '$sender_id'";
    $result_sender = $conn->query($sql_sender);

    if ($result_sender->num_rows > 0) {
        $sender = $result_sender->fetch_assoc();
    } else {
        echo "Sender not found";
        exit();
    }

    // Get recipient information
    $sql_recipient = "SELECT id, balance FROM bank_users WHERE username = '$recipient'";
    $result_recipient = $conn->query($sql_recipient);

    if ($result_recipient->num_rows > 0) {
        $recipient_user = $result_recipient->fetch_assoc();
        $recipient_id = $recipient_user["id"];
    } else {
        echo "Recipient not found";
        exit();
    }

    // Check if the sender has enough balance
    if ($sender["balance"] >= $amount) {
        // Update balances
        $new_sender_balance = $sender["balance"] - $amount;
        $new_recipient_balance = $recipient_user["balance"] + $amount;

        // Update sender's balance
        $sql_update_sender = "UPDATE bank_users SET balance = '$new_sender_balance' WHERE id = '$sender_id'";
        $conn->query($sql_update_sender);

        // Update recipient's balance
        $sql_update_recipient = "UPDATE bank_users SET balance = '$new_recipient_balance' WHERE id = '$recipient_id'";
        $conn->query($sql_update_recipient);

        // Redirect back to the account page
        header("Location: account.php");
        exit();
    } else {
        echo "Insufficient balance";
    }
    
    $conn->close();
}
?>
