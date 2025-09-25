<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 15px;
    }
    
    .container {
      width: 100%;
      max-width: 400px;
      background: #fff;
      padding: 30px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.7);
      border-radius: 10px;
    }
    
    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form action="logaction.php" method="POST">
      <div class="mb-3">
        <label for="email" class="form-label">Username or Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Enter username or email" required />
        <div class="invalid-feedback">Please enter your username or email.</div>
      </div>

      <div class="mb-3">
        <label for="Pass" class="form-label">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="Pass" placeholder="Password" required minlength="6" />
        <div class="invalid-feedback">Please enter your password (minimum 6 characters).</div>
      </div>

      <div class="mb-3 d-flex justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary" name="login">Login</button>
        <h4>New Here?</h4>
        <a href="register.php"><input type="button" value="Register" class="btn btn-secondary"></a>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
