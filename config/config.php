<?php
session_start();

if (isset($_SESSION['loggedin'])) {
    
    $userId = $_SESSION['id'];
    $userName = $_SESSION['name'];
    $name = '<small>Hello</small>'.$_SESSION['name'];
    $link = "profile.php";
    $logged = false;
    $s = "SELECT * FROM `carts` WHERE userid = $userId";
    $cartNum = $DB->CountRows($s);
}
?>