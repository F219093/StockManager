<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Management - Stock System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .navbar {
            height: 50px; /* Set custom height for navbar */
            background-color: #343a40; /* Dark background color */
        }

        .navbar-brand {
            margin-left: auto;
            margin-right: auto;
            color: white; /* Text color */
            text-align: center; /* Center text */
            width: 100%; /* Full width */
        }

        .notification-icon {
            margin-right: 15px; /* Adjust position */
            color: white; /* Icon color */
            font-size: 24px; /* Icon size */
            position: relative;
        }

        .notification-badge {
            position: absolute;
            top: -8px; /* Adjust position */
            right: -8px; /* Adjust position */
            background-color: red; /* Badge background color */
            color: white; /* Badge text color */
            border-radius: 50%; /* Rounded badge */
            width: 18px; /* Badge width */
            height: 18px; /* Badge height */
            font-size: 12px; /* Badge text size */
            display: flex; /* Flex layout for centering */
            justify-content: center; /* Center content horizontally */
            align-items: center; /* Center content vertically */
        }
    </style>
</head>
<body>

  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">Crew Innovations</a>
    <div class="notification-icon">
        <i class="fas fa-bell"></i>
        <!-- Notification badge -->
        <span class="notification-badge">1</span>
    </div>
  </nav>

</body>
</html>
