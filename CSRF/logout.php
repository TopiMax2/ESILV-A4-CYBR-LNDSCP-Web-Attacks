<?php
session_start();
session_destroy();
header("Location: CSRF.html");
exit();
?>