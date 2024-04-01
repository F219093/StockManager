<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Management - Stock System</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Custom sidebar styles */
    .sidebar {
      height: 100%;
      width: 150px;
      position: fixed;
      top: 0;
      left: 0;
      background-color: #f8f9fa;
      border-right: 1px solid #e5e5e5;
      padding-top: 60px;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar li {
      padding: 10px 20px;
    }

    .sidebar li a {
      text-decoration: none;
      color: #333;
    }

    .sidebar li a:hover {
      color: #007bff;
    }

    /* Add padding to the container to avoid content overlaying the sidebar */
    .container {
      padding-left: 150px; /* Adjust this value to match the width of the sidebar */
    }

    /* Add a border to the left side of the container */
    .container {
      border-left: 1px solid #e5e5e5;
    }

    /* Style for logout link */
    .logout-link {
      position: absolute;
      bottom: 20px;
      width: 100%;
      text-align: center;
      color: #333;
    }

    .logout-link i {
      margin-right: 5px;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <ul class="navbar-nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="staff.php"><i class="fas fa-users"></i> Staff</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-cubes"></i> Stock</a>
        <ul>
          <li><a href="#">Products</a></li>
          <li><a href="#">Categories</a></li>
          <li><a href="#">Brands</a></li>
          <li><a href="#">Expired</a></li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-cash-register"></i> Point of Sale (POS)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-chart-line"></i> Sales & Profit</a>
      </li>
    </ul>
    <!-- Logout link -->
    <div class="logout-link">
      <a href="login.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
