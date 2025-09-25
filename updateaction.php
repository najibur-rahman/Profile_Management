<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['uname'])) {
    echo "<script>alert('Please login first'); location.href='login.php';</script>";
    exit;
}

$id = $_POST['id'];
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['Pass'];

if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_name = time() . "_" . $_FILES['image']['name']; // unique নাম
    $image_path = "image/" . $image_name;
    move_uploaded_file($image_tmp, $image_path);

    $update_query = "UPDATE register 
                     SET regName='$name', regUserName='$username', regEmail='$email', regPhone='$phone', regPassword='$password', image='$image_path' 
                     WHERE id='$id'";
} else {
    $update_query = "UPDATE register 
                     SET regName='$name', regUserName='$username', regEmail='$email', regPhone='$phone', regPassword='$password' 
                     WHERE id='$id'";
}

if (mysqli_query($connect, $update_query)) {
    $_SESSION['uname'] = $username;
    echo "<script>alert('Profile updated successfully'); window.location='dashboard.php';</script>";
} else {
    echo "Error: " . mysqli_error($connect);
}
?>
