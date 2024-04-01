<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stock Management System Dashboard</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Custom CSS -->
  
</head>
<body>

  <!-- Navigation Bar -->
  
  <?php include 'navbar.php'; ?>
  <?php include 'sidebar.php'; ?>
  <!-- Page Content -->
  <div class="container-fluid">
    <div class="row">
      <!-- Main Content -->
      <div class="col-md-9 ml-sm-auto col-lg-9 mx-auto px-4"> <!-- Adjusted column classes -->
        <h2 class="text-center mb-4">Dashboard</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
              <div class="card-header">Total Stock</div>
              <div class="card-body">
                <h5 class="card-title"><i class="fas fa-box"></i> 500</h5> <!-- Example: Replace 500 with actual total stock -->
                <p class="card-text">View Details <i class="fas fa-arrow-circle-right"></i></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
              <div class="card-header">Total Sales</div>
              <div class="card-body">
                <h5 class="card-title"><i class="fas fa-chart-line"></i> $10,000</h5> <!-- Example: Replace $10,000 with actual total sales -->
                <p class="card-text">View Details <i class="fas fa-arrow-circle-right"></i></p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
              <div class="card-header">Total Loss</div>
              <div class="card-body">
                <h5 class="card-title"><i class="fas fa-exclamation-triangle"></i> $500</h5> <!-- Example: Replace $500 with actual total loss -->
                <p class="card-text">View Details <i class="fas fa-arrow-circle-right"></i></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Sales Overview</h5>
                <!-- Example chart for sales over time -->
                <canvas id="salesChart" width="400" height="200"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Profit and Loss</h5>
                <!-- Example chart for profit and loss -->
                <canvas id="profitLossChart" width="400" height="200"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      // Toggle sidebar on button click
      $('#sidebarToggle').click(function() {
        $('#sidebar').toggleClass('active');
      });
    });
  </script>
</body>
</html>
