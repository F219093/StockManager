<?php
// Check if email and status are set
if (isset($_POST['email']) && isset($_POST['status'])) {
    // Get email and status from POST data
    $email = $_POST['email'];
    $status = $_POST['status'];

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'stocksystem');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to update status
    $sql = "UPDATE user SET status = $status WHERE email = '$email'";
    if ($conn->query($sql) === TRUE) {
        // Success response
        $response = "Status updated successfully";
    } else {
        // Error response
        $response = "Error updating status: " . $conn->error;
    }

    // Close database connection
    $conn->close();

    // Send JSON response
    echo json_encode(['message' => $response]);
} else {
    // If email or status are not set in POST data
    echo "Invalid request";
}
?>
