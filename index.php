<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    :root {
      --primary-color: #12c7e6;
      --background-light: #f8f9fa;
      --background-dark: #1e1e2f;
      --text-light: #111;
      --text-dark: #ddd;
      --card-bg-light: #fff;
      --card-bg-dark: #2c2c44;
      --shadow-light: rgba(18, 199, 230, 0.3);
      --shadow-dark: rgba(0, 0, 0, 0.6);
    }

    body.dark-mode {
      background-color: var(--background-dark);
      color: var(--text-dark);
      transition: background-color 0.3s ease, color 0.3s ease;
    }
    body {
      background: var(--background-light);
      color: var(--text-light);
      margin: 0;
      font-family: Arial, sans-serif;
      transition: background-color 0.3s ease, color 0.3s ease;
    }
    .navbar {
      background: #eaeaea;
      display: flex;
      align-items: center;
      padding: 0 18px;
      height: 60px;
    }
    .navbar-icon {
      margin-right: 18px;
      height: 40px;
      width: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .navbar-icon img {
      height: 40px;
      width: 40px;
    }
    .d-flex.ms-auto.gap-3 {
      margin-left: auto;
      display: flex;
      align-items: center;
      gap: 18px;
    }
    .nav-link {
      font-weight: 600;
      color: var(--text-light);
      text-decoration: none;
      transition: color 0.25s;
      cursor: pointer;
    }
    body.dark-mode .nav-link {
      color: var(--text-dark);
    }
    .nav-link:hover {
      color: var(--primary-color);
    }
    .dark-mode-toggle {
      background-color: #777777;
      border-radius: 25px;
      width: 70px;
      height: 36px;
      cursor: pointer;
      display: flex;
      align-items: center;
      padding: 4px;
      position: relative;
      box-shadow: none;
      justify-content: flex-start;
      transition: background-color 0.3s ease;
    }
    .toggle-circle {
      background-color: #ffffff;
      width: 28px;
      height: 28px;
      border-radius: 50%;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .dark-mode .dark-mode-toggle {
      background-color: #555555;
    }
    .dark-mode .toggle-circle {
      transform: translateX(34px);
      background-color: #ffffff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
    }
    .container {
      text-align: center;
      margin-top: 75px;
    }
    h1 {
      font-size: 2.6em;
      font-weight: bold;
      margin-bottom: 35px;
    }
    ul {
      display: inline-block;
      text-align: left;
      font-size: 1.1em;
      margin-bottom: 30px;
      padding-left: 1.25em;
    }
    .options {
      display: flex;
      justify-content: center;
      gap: 40px;
      margin-top: 35px;
    }
    .options button {
      font-weight: bold;
      font-size: 1.2em;
      cursor: pointer;
      background-color: var(--primary-color);
      color: #fff;
      border: none;
      border-radius: 6px;
      padding: 0.5em 1.5em;
      transition: background-color 0.3s ease;
    }
    .options button:hover {
      background-color: #0a93af;
    }
    body.dark-mode .navbar {
      background: #555 !important;
      color: var(--text-dark);
    }

    body.dark-mode .navbar .nav-link {
      color: var(--text-dark);
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar">
    <div class="navbar-icon">
      <img src="image/profile.png" alt="user" />
    </div>
    <div class="d-flex ms-auto gap-3">
      <a href="dashboard.php" class="nav-link">Dashboard</a>
      <a href="register.php" class="nav-link">Register</a>
      <a href="login.php" class="nav-link">Log in</a>
      <div class="dark-mode-toggle" role="button" tabindex="0" aria-label="Toggle Dark Mode" id="darkModeToggle">
        <div class="toggle-circle"></div>
      </div>
    </div>
  </nav>

  <!-- Landing Content -->
  <div class="container">
    <h1>Welcome to My Web</h1>
    <ul>
      <li>Landing Page with options to Register or Login</li>
      <li>Authentication Forms styled with Bootstrap for clean UX</li>
      <li>User Dashboard showing profile info, CRUD buttons, and a dark/light mode</li>
    </ul>
    <div class="options">
      <button onclick="location.href='login.php'">Login</button>
      <button onclick="location.href='register.php'">Register</button>
    </div>
  </div>

  <script>
    const toggleBtn = document.getElementById('darkModeToggle');
    toggleBtn.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
      toggleBtn.classList.toggle('active');
    });
  </script>
</body>

</html>
