<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['userid'])) {
    echo "<script>alert('Please login first'); window.location='login.php';</script>";
    exit;
}

$userid = $_SESSION['userid'];

$delete = "DELETE FROM `register` WHERE id = '$userid'";
if (mysqli_query($connect, $delete)) {
    session_destroy();
    echo "<script>alert('Your account has been deleted successfully'); window.location='register.php';</script>";
} else {
    echo "Error deleting account: " . mysqli_error($connect);
}
?>
