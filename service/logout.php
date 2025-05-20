<?php
include 'config.php';

// Logout & hapus session
    session_destroy();
    header("Location:../index.php");
    exit();

    ?>
