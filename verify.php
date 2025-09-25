<?php
include 'connect.php';

if(isset($_POST['verify'])){
    $email = trim($_POST['email']);   
    $token_input = trim($_POST['token']);

    $query = "SELECT * FROM register WHERE regEmail='$email' AND token='$token_input'";
    $result = mysqli_query($connect, $query);

    if(!$result){
        die("Query Failed: ".mysqli_error($connect));
    }

    if(mysqli_num_rows($result) > 0){
        mysqli_query($connect, "UPDATE register SET is_verified=1, token=NULL WHERE regEmail='$email'");
        echo "<script>alert('Email verified successfully'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Invalid token or email'); window.location='verify.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
.container {
  background: #fff;
  padding: 80px;
  box-shadow: 0 0 15px rgba(0,0,0,0.9);
  border-radius: 10px;
  max-width: 500px;
  margin-top: 20px;
  margin-bottom: 20px;
  box-sizing: border-box;
}
.container .form-control {
  margin: 0;
  width: 100%;
  box-sizing: border-box;
}
  </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Verify Your Email</h2>
    <form method="post" class="mx-auto" style="max-width:400px;">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Token</label>
            <input type="text" name="token" class="form-control" required>
        </div>
        <button type="submit" name="verify" class="btn btn-primary w-100">Verify Email</button>
    </form>
</div>
</body>
</html>
