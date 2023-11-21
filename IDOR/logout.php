<?php
session_start();
session_destroy();
header("Location: IDOR.html");
exit();
?>
