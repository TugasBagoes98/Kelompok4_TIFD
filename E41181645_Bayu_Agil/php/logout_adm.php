<?php
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
    setcookie('op0', '', time() - 3600);
    setcookie('op1', '', time() - 3600);
    header("Location: login_adm.php");
    exit;
?>