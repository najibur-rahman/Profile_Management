
<?php

include 'connect.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Get form data
$image=$_FILES['image'];
$r_name = $_POST['name'];
$r_username = $_POST['username'];
$r_email = $_POST['email'];
$r_phone = $_POST['phone'];                 
$r_pass = $_POST['Pass'];
$r_cpass = $_POST['cpass'];

$imagelocation=$_FILES['image']['tmp_name']; 
$imagename=$_FILES['image']['name']; 
$image_final_des="image/".$imagename;

move_uploaded_file($imagelocation,$image_final_des); 

$emailpattern = "/^[a-z0-9]+@gmail\.com$/";
$phonepattern = "/(\+88)?01[3-9]\d{8}/";

$duplicate=mysqli_query($connect,"SELECT * FROM `register` WHERE regEmail='$r_email'");

if (strlen($r_name) < 2 || strlen($r_name) > 20) {
    echo "<script> alert('Name must be between 2-20 characters'); location.href='register.php';</script>";
} else if(empty($r_username)){
    echo "<script> alert('Username is required'); location.href='register.php';</script>";
} else if (!preg_match($emailpattern, $r_email)) {
    echo "<script> alert('Email is invalid'); location.href='register.php';</script>";
} else if (!preg_match($phonepattern, $r_phone)) {
    echo "<script> alert('Phone number is invalid'); location.href='register.php';</script>";
} else if ($r_pass !== $r_cpass) {
    echo "<script> alert('Passwords do not match'); location.href='register.php';</script>";
} else if (mysqli_num_rows($duplicate)>0) {
    echo "<script> alert('Email already exists'); location.href='register.php';</script>";
} else {
    $token = bin2hex(random_bytes(16));

    $insertquery = "INSERT INTO `register`(`image`, `regName`, `regUserName`, `regEmail`, `regPhone`, `regPassword`, `token`) 
                    VALUES ('$image_final_des','$r_name','$r_username','$r_email','$r_phone','$r_pass','$token')";

    if(!mysqli_query($connect,$insertquery)){
        die('Not inserted: '.mysqli_error($connect));
    } else {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'najiburr931@gmail.com'; 
            $mail->Password   = 'sdtp syey mkbt psmy'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = 465;

            $mail->setFrom('najiburr931@gmail.com', 'Your Site Name');
            $mail->addAddress($r_email, $r_name);

            $mail->isHTML(true);
            $mail->Subject = 'Email Verification Token';
            $mail->Body    = "
                <h3>Hello $r_name,</h3>
                <p>Thank you for registering. Use the following token to verify your account:</p>
                <h2>$token</h2>
                <p>Go to <a href='#'>verify.php</a> to enter your token and verify your email.</p>
            ";

            $mail->send();
            echo "<script>alert('Registration successful! Check your email for the verification token.'); location.href='verify.php';</script>";

        } catch (Exception $e) {
            echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}'); location.href='register.php';</script>";
        }
    }
}
?>
