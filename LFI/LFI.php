<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>LFI Demo</title>
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

    <main>
        <section>
            <h2>LFI (Local File Inclusion) Demo</h2>
            <p>This page simulates a Local File Inclusion vulnerability. Do not use this code in a real-world scenario.</p>
            <form method="get">
            Filename: <input type="text" name="file"><br>
            <input type="submit" value="Search">
            </form>
            <?php
            // lfi-script.php

            // Simulating LFI vulnerability (for educational purposes only)
            // In a real-world scenario, never implement LFI vulnerabilities intentionally
            // This is for educational purposes and should not be used in a real-world scenario

            $file = $_GET['file'];

            if (isset($file)) {
                $filePath = "files/{$file}";

                // Check if the file exists before including it
                if (file_exists($filePath)) {
                    $fileContent = file_get_contents($filePath);

                    // Display the content within a pre tag
                    echo $fileContent;
                } else {
                    echo 'File not found';
                }
            } else {
                echo 'File will be displayed here.';
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 Web Vulnerability Demos</p>
    </footer>

    <!-- External PHP script -->
    <script src="lfi-script.js"></script>
</body>
</html>
