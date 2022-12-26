<?php
    session_start();
    session_unset();
    session_destroy();
    unset($_SESSION['login_timestamp']);
    header("location: Main.php");
    exit;
?>