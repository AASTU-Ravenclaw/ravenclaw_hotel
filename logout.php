<?php
session_start();
if(isset($_SESSION['username'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>