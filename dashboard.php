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
    $name = $row['regName'];
    $username = $row['regUserName'];
    $email = $row['regEmail'];
    $phone = $row['regPhone'];
    $image = $row['image'];
} else {
    echo "<script>alert('User not found'); location.href='login.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>User Dashboard</title>
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
    body.dark-mode{ 
      background-color: var(--background-dark); 
      color: var(--text-dark); 
    }
    body{ 
      background-color: var(--background-light); 
      color: var(--text-light); 
    }
    .navbar{ 
      background-color: var(--card-bg-light); 
      padding: 0.75rem 2rem; 
      font-weight: 600; 
      box-shadow: 0 2px 8px var(--shadow-light); 
    }
    body.dark-mode .navbar{ 
      background-color: var(--card-bg-dark); 
      box-shadow: 0 2px 8px var(--shadow-dark); 
    }
    .navbar-brand{ font-size: 1.5rem; 
      color: var(--primary-color); 
    }
    .nav-link{ color: var(--text-light); 
      font-weight: 600; 
      padding: 0.5rem 1rem; 
    }
    body.dark-mode .nav-link{ 
      color: var(--text-dark); 
    }
    .nav-link:hover{ 
      color: var(--primary-color); 
    }
    .dashboard-wrapper{ 
      display: flex; 
      justify-content: center; 
      align-items: center; 
      padding: 2rem; 
    }
    .dashboard-content{ 
      background: var(--card-bg-light); 
      box-shadow: 0 8px 20px var(--shadow-light); 
      border-radius: 1rem; 
      max-width: 800px; 
      width: 100%; 
      display: flex; 
      gap: 2rem; 
      padding: 2rem; 
      align-items: center; 
    }
    body.dark-mode .dashboard-content{ 
      background: var(--card-bg-dark); 
      box-shadow: 0 8px 24px var(--shadow-dark); 
    }
    .profile-icon img{ 
      width: 220px; 
      height: 220px; 
      border-radius: 50%; 
      border: 6px solid var(--primary-color); 
      box-shadow: 0 0 15px var(--primary-color); 
      object-fit: cover; 
    }
    .profile-info{ 
      flex: 1; 
      display: flex; 
      flex-direction: column; 
      gap: 1rem; 
      font-size: 1.2rem; 
      font-weight: 600; 
    }
    .profile-info strong{ 
      background: var(--primary-color); 
      color: #fff; 
      padding: 0.5rem 1rem; 
      border-radius: 12px; 
    }
    .dark-mode-toggle {
      background-color: #777777;
      border-radius: 25px;
      width: 70px;
      height: 36px;
      padding: 4px;
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
  </style>
</head>
<body>
  <nav class="navbar d-flex align-items-center">
    <div class="navbar-brand">Dashboard</div>
    <div class="d-flex align-items-center ms-auto gap-3">
      <a href="index.php" class="nav-link">Home</a>
      <a href="mail.php" class="nav-link">Mail</a>
      <a href="update.php?id=<?php echo $row['id']; ?>" class="nav-link">Update</a>
      <a href="logout.php" class="nav-link">Log out</a>
      <a href="delete.php?id=<?php echo $row['id']; ?>" class="nav-link text-danger"
        onclick="return confirm('Are you sure you want to delete your profile? This action cannot be undone.');">
        Delete Profile
      </a>

       <div class="dark-mode-toggle" role="button" tabindex="0" aria-label="Toggle Dark Mode" id="darkModeToggle">
        <div class="toggle-circle"></div>
      </div>
    </div>
  </nav>

  <main class="dashboard-wrapper">
    <section class="dashboard-content">
      <div class="profile-icon">
        <img src="<?php echo $image; ?>" alt="Profile Image" />
      </div>
      <div class="profile-info">
        <strong><?php echo $name; ?></strong>
        <strong>Username: <?php echo $username; ?></strong>
        <strong>Email: <?php echo $email; ?></strong>
        <strong>Phone: <?php echo $phone; ?></strong>
      </div>
    </section>
  </main>

    <script>
    const toggleBtn = document.getElementById('darkModeToggle');
    toggleBtn.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
      toggleBtn.classList.toggle('active');
    });
  </script>
</body>
</html>
