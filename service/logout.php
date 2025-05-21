<?php
include 'config.php';
 session_start();
 // Cek session
 if(!isset($_SESSION["user"])) {
 header("Location: login.php");
 }
 // Logout & hapus session
 if (isset($_POST['logout'])) {
 session_unset();
 header("Location: login.php");
 }
    ?>