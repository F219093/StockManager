<?php
// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate form data (add more validation if required)
    if (empty($name) || empty($email) || empty($password)) {
        // If any field is empty, return an error response
        $response = array(
            'status' => 'error',
            'message' => 'All fields are required.'
        );
        echo json_encode($response);
        exit();
    }

    // Sanitize form data
    $name = htmlspecialchars($name);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = htmlspecialchars($password);

    // Add additional validation for email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // If email is invalid, return an error response
        $response = array(
            'status' => 'error',
            'message' => 'Invalid email format.'
        );
        echo json_encode($response);
        exit();
    }

    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'stocksystem');
    if ($conn->connect_error) {
        // If database connection fails, return an error response
        $response = array(
            'status' => 'error',
            'message' => 'Database connection failed: ' . $conn->connect_error
        );
        echo json_encode($response);
        exit();
    }

    // Prepare and execute SQL query to insert staff member
    $sql = "INSERT INTO user (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $password);
    if ($stmt->execute()) {
        // If insertion is successful, return a success response
        $response = array(
            'status' => 'success',
            'message' => 'Staff member added successfully.'
        );
        echo json_encode($response);
    } else {
        // If insertion fails, return an error response
        $response = array(
            'status' => 'error',
            'message' => 'Failed to add staff member: ' . $conn->error
        );
        echo json_encode($response);
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If form data is not submitted via POST method, return an error response
    $response = array(
        'status' => 'error',
        'message' => 'Invalid request method.'
    );
    echo json_encode($response);
}
?>
