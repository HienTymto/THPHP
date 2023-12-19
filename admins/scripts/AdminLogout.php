<?php
session_start();

if (isset($_SESSION['admin_login'])) {
    session_unset();
    session_destroy();
}

header("Location: ../index.php");
exit;
?>
