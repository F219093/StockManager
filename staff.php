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
</head>
<body>

  <!-- Navigation Bar -->
  <!-- Include your navigation bar here -->
  <?php include 'navbar.php'; ?>
  <?php include 'sidebar.php'; ?>
  <!-- Page Content -->
  <div class="container mt-5">
  <a href="dashboard.php" class="btn btn-secondary mb-3"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    <h2>Staff Management</h2>
    <div class="row">
      <!-- Show Old Staff -->
      <div class="col-md-6">
        <div class="card mb-4">
          <div class="card-header">
            Existing Staff
          </div>
          <div class="card-body">
            <ul class="list-group">
              <?php
              // Connect to the database
              $conn = new mysqli('localhost', 'root', '', 'stocksystem');
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              // Fetch existing staff members
              $sql = "SELECT * FROM user";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  // Display verification status based on the 'status' field
                  $verificationStatus = $row['status'] == 1 ? 'Verified' : 'Not Verified';
                  echo "<li class='list-group-item'>" . $row['name'] . " - " . $row['email'] . " - Verification Status: " . $verificationStatus . "</li>";
                }
              } else {
                echo "<li class='list-group-item'>No staff members found.</li>";
              }
              $conn->close();
              ?>
            </ul>
          </div>
        </div>
      </div>
      <!-- Show Staff Actions -->
      <!-- Show Staff Actions -->
<div class="col-md-6">
    <div class="card mb-4">
        <div class="card-header">
            Staff Actions
        </div>
        <div class="card-body">
            <ul class="list-group">
                <?php
                // Connect to the database
                $conn = new mysqli('localhost', 'root', '', 'stocksystem');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                // Fetch existing staff members with actions
                $sql = "SELECT * FROM user";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li class='list-group-item'>";
                        echo "<span>" . $row['name'] . " - " . $row['email'] . "</span>";
                        echo "<div class='btn-group float-right' role='group'>";
                        echo "<a href='edit_staff.php?email=" . $row['email'] . "' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i> Edit</a>";
                        echo "<a href='delete_staff.php?email=" . $row['email'] . "' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i> Delete</a>";
                        // Display verification status dynamically
                        $verificationIcon = $row['status'] == 1 ? 'fa-check-circle' : 'fa-times-circle';
                        $verificationColor = $row['status'] == 1 ? 'text-success' : 'text-danger';
                        echo "<button class='btn btn-sm btn-info verify-button' data-email='" . $row['email'] . "' data-status='" . $row['status'] . "'><i class='fas $verificationIcon $verificationColor'></i></button>";
                        echo "</div>";
                        echo "</li>";
                    }
                } else {
                    echo "<li class='list-group-item'>No staff members found.</li>";
                }
                $conn->close();
                ?>
            </ul>
        </div>
    </div>

</div>
    </div>
    <!-- Add New Staff Form -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        Add New Staff
      </div>
      <div class="card-body">
        <form id="addStaffForm" action="add_staff.php" method="POST">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Add Staff</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="successMessage"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // Submit form via AJAX
    $('#addStaffForm').submit(function(event) {
      event.preventDefault(); // Prevent default form submission

      // Perform AJAX request
      $.ajax({
        type: 'POST',
        url: 'add_staff.php',
        data: $(this).serialize(), // Serialize form data
        dataType: 'json',
        success: function(response) {
          // Show success message in modal
          $('#successMessage').text(response.message);
          $('#successModal').modal('show');

          // Reload the page after a delay
          setTimeout(function() {
            location.reload();
          }, 2000); // 2000 milliseconds (2 seconds)
        },
        error: function(xhr, status, error) {
          // Show error message
          alert('Failed to add staff member.');
        }
      });
    });
  });
  
  $(document).ready(function() {
    // Handle verification status toggle
    $('.verify-button').click(function() {
      var email = $(this).data('email');
      var status = $(this).data('status');
      // Toggle status (1 to 0, 0 to 1)
      status = status === 1 ? 0 : 1;

      // Update status via AJAX
      $.ajax({
        type: 'POST',
        url: 'status.php',
        data: { email: email, status: status },
        dataType: 'json',
        success: function(response) {
          // Show success message
          $('#successMessage').text(response.message);
          $('#successModal').modal('show');

          // Reload the page after a delay
          setTimeout(function() {
            location.reload();
          }, 2000); // 2000 milliseconds (2 seconds)
        },
        error: function(xhr, status, error) {
          // Show error message
          alert('Failed to update verification status.');
        }
      });
    });
  });

</script>



</body>
</html>
