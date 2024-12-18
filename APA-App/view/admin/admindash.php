<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: ../login.php');
    }
?>

<?php include '../../db/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../assets/css/dashboard.css">

</head>

    <body>
        <header class="header navbar navbar-expand-md bg-light p-3">
            <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- Logo Section -->
            <div class="d-flex align-items-center gap-3">
                <svg width="32" height="32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="..." />
                </svg>
                <h2 class="mb-0">Ashesi Pool Association</h2>
            </div>
        
            <!-- Navbar Toggler Button -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <!-- Navigation Links -->
            <nav class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item">
                        <a href="admindash.php" class="nav-link text-dark">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="users.php" class="nav-link text-dark">Users</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin_events.php" class="nav-link text-dark">Events</a>
                    </li>
                </ul>
            </nav>
        
            <!-- Profile Section -->
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-create px-4" onclick="window.location.href = 'admin_profile.php'">Profile</button>
                <div
                class="profile-pic rounded-circle"
                style="
                    width: 40px;
                    height: 40px;
                    background-image: url('../../assets/images/chalk.jpg');
                    background-size: cover;
                    background-position: center;
                "
                ></div>
            </div>
            </div>
        </header>
    
        <!-- Main Page content -->
        <main class="container-fluid mt-4">
            <!-- Welcome Section -->
            <section class="welcome-section text-center mb-4">
                <h3>Welcome, Admin Jack</h3> <!-- This will be dynamically updated -->
            </section>

            <!-- Statistics Section -->
            <section class="row text-center mb-4 statistics-section">
                <!-- Registered Users -->
                <div class="col-12 col-md-4 mb-3">
                    <div class="card shadow-sm p-3">
                        <h5>Registered Users</h5>
                        <h2 class="text-primary total-users">100</h2> <!-- This can be fetched separately if needed -->
                    </div>
                </div>

                <!-- Total Events Held -->
                <div class="col-12 col-md-4 mb-3">
                    <div class="card shadow-sm p-3">
                        <h5>Total Events Held</h5>
                        <h2 class="text-primary total-events">13</h2> <!-- This will be dynamically updated -->
                    </div>
                </div>

                <!-- Pending Events -->
                <div class="col-12 col-md-4 mb-3">
                    <div class="card shadow-sm p-3">
                        <h5>Pending Events</h5>
                        <h2 class="text-success pending-events">7</h2> <!-- This will be dynamically updated -->
                    </div>
                </div>
            </section>

            <!-- Match Challenges html -->
            <div class="container scheduled-matches">
                <h2>Scheduled Matches</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Match ID</th>
                            <th>Match</th>
                            <th>Schedule Date</th>
                            <th>Select Winner</th>
                        </tr>
                    </thead>
                    <tbody id="matches-body">
                        <!-- Dynamic match rows will be inserted here -->
                    </tbody>
                </table>
            </div>

        </main>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets/js/admindash.js"></script>
    </body>

</html>

