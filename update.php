<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['uname'])) {
    echo "<script>alert('Please login first'); location.href='login.php';</script>";
    exit;
}

$user = $_SESSION['uname'];

$query = "SELECT * FROM register WHERE regUserName='$user' OR regEmail='$user' LIMIT 1";
$result = mysqli_query($connect, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('User not found'); window.location='dashboard.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Update Profile</title>
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
  width: 100%;
  box-sizing: border-box;
}
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4 text-center">Update Profile</h2>

    <form action="updateaction.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

      <div class="mb-3">
        <label class="form-label">Current Image</label><br>
        <img src="<?php echo $row['image']; ?>" width="100">
        <input type="file" class="form-control mt-2" name="image">
      </div>

      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="<?php echo $row['regName']; ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $row['regUserName']; ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email" value="<?php echo $row['regEmail']; ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" class="form-control" name="phone" value="<?php echo $row['regPhone']; ?>">
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="Pass" value="<?php echo $row['regPassword']; ?>">
      </div>

      <button type="submit" class="btn btn-primary w-100">Update</button>
    </form>
  </div>
</body>
</html>
