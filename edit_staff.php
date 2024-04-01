<?php
// Initialize variables
$name = "";
$email = "";
$password = "";

// Check if email is provided
if(isset($_GET['email']) && !empty($_GET['email'])) {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'stocksystem');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch staff member details based on provided email
    $email = $_GET['email'];
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $password = $row['password'];
    } else {
        echo "No staff member found with provided email.";
        exit();
    }
} else {
    echo "Invalid email provided.";
    exit();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and execute SQL query to update staff member
    $stmt = $conn->prepare("UPDATE user SET name = ?, email = ?, password = ? WHERE email = ?");
    $stmt->bind_param("ssss", $_POST['name'], $_POST['email'], $_POST['password'], $_GET['email']);
    $stmt->execute();

    // Close statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect back to staff management page after editing
    header("Location: staff.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff Member</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
    <?php include 'sidebar.php'; ?>
    <div class="container mt-5">
        <h2>Edit Staff Member</h2>
        <div class="row">
            <div class="col-md-6">
                <h3>Existing Data</h3>
                <form>
                    <div class="form-group">
                        <label for="existingName">Name:</label>
                        <input type="text" class="form-control" id="existingName" name="existingName" value="<?php echo $name; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="existingEmail">Email:</label>
                        <input type="email" class="form-control" id="existingEmail" name="existingEmail" value="<?php echo $email; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="existingPassword">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="existingPassword" name="existingPassword" value="<?php echo $password; ?>" readonly>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-eye" id="toggleExistingPassword"></i></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h3>New Data</h3>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter new name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter new email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-eye" id="togglePassword"></i></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <a href="staff.php" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Back to Staff Management</a>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Toggle visibility of existing password
            $('#toggleExistingPassword').click(function() {
                var passwordField = $('#existingPassword');
                var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
            });

            // Toggle visibility of new password
            $('#togglePassword').click(function() {
                var passwordField = $('#password');
                var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
            });
        });
    </script>
</body>
</html>
