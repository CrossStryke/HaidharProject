<?php
include '../connect.php';
session_start();
if (!$_SESSION['authenticated'] || $_SESSION['authenticated'] !=true) {
    # code...
    header('location: ../login.php');
}
?>