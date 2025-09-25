<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
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
  <div class="container">
    <h2 class="mb-4 text-center">Create an Account</h2>

    <form action="regaction.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="image" class="form-label">Profile Picture</label>
        <input type="file" class="form-control" id="image" name="image" aria-label="Profile picture" required />
        <div class="invalid-feedback">Please upload a profile picture.</div>
      </div>

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required />
        <div class="invalid-feedback">Please enter your name.</div>
      </div>

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
        <div class="invalid-feedback">Please choose a username.</div>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required />
        <div class="invalid-feedback">Please enter a valid email address.</div>
      </div>

      <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="phone" name="phone" placeholder="123-456-7890" pattern="\d{3}[- ]?\d{3}[- ]?\d{4}" required />
        <div class="invalid-feedback">Please enter a valid phone number.</div>
      </div>

      <div class="mb-3">
        <label for="Pass" class="form-label">Password</label>
        <input type="password" class="form-control" id="Pass" name="Pass" placeholder="Password" required minlength="6" />
        <div class="invalid-feedback">Please enter a password with at least 6 characters.</div>
      </div>

      <div class="mb-3">
        <label for="cpass" class="form-label">Re-Password</label>
        <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Re-Password" required minlength="6" />
        <div class="invalid-feedback" id="repass-feedback">Please re-enter the password.</div>
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Register</button>
      </div>
    </form>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
