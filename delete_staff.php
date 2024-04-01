<?php
// Check if email is provided
if(isset($_GET['email']) && !empty($_GET['email'])) {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'stocksystem');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and execute SQL query to delete staff member
    $stmt = $conn->prepare("DELETE FROM user WHERE email = ?");
    $stmt->bind_param("s", $_GET['email']);
    $stmt->execute();
    
    // Close statement and database connection
    $stmt->close();
    $conn->close();
    
    // Redirect back to staff management page after deletion
    header("Location: staff.php");
    exit();
} else {
    echo "Invalid email provided.";
}
?>
