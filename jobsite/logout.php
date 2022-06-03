<?php
session_start();

//
if (!isset($_SESSION['login']) && $_SESSION['login'] != true) {
    header("Location: login.php");
    exit;

}
unset($_SESSION['userid']);
unset($_SESSION['name']);
unset($_SESSION['personflag']);
unset($_SESSION['login']);
header("Location: index.php");

?>
