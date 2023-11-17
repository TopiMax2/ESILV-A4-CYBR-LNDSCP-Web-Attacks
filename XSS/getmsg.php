<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_input = $_POST["user_input"];
    // Intentionally not using htmlspecialchars to introduce XSS vulnerability
    
    echo "<p>User Input: " . $user_input . "</p>";
}
?>
