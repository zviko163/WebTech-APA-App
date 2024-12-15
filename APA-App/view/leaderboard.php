<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700;900&family=Noto+Sans:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/leaderboard.css">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                    <a href="dashboard.php" class="nav-link text-dark">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="leaderboard.php" class="nav-link text-dark">Leaderboard</a>
                </li>
                <li class="nav-item">
                    <a href="events.php" class="nav-link text-dark">Events</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark">Challenge</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark">Contact Support</a>
                </li>
            </ul>
        </nav>
    
        <!-- Profile Picture Section -->
        <div class="d-flex align-items-center gap-3">
        <button class="btn btn-create px-4" onclick="window.location.href = 'profile.php'">Profile</button>
            <div
            class="profile-pic rounded-circle"
            style="
                width: 40px;
                height: 40px;
                background-image: url('../assets/images/chalk.jpg');
                background-size: cover;
                background-position: center;
            "
            ></div>
        </div>
        </div>
    </header>

    <!-- Leaderboard -->
    <div class="container leaderboard">
      <h2>Leaderboard</h2>
      <table class="table table-striped">
          <thead>
              <tr>
                  <th>Rank</th>
                  <th>Player</th>
                  <th>Played</th>
                  <th>Wins</th>
                  <th>Losses</th>
                  <th>Win %</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>1</td>
                  <td>John Smith</td>
                  <td>20</td>
                  <td>10</td>
                  <td>2</td>
                  <td>83%</td>
              </tr>
              <tr>
                  <td>2</td>
                  <td>Jane Doe</td>
                  <td>12</td>
                  <td>8</td>
                  <td>4</td>
                  <td>67%</td>
              </tr>
              <tr>
                  <td>3</td>
                  <td>Mike Johnson</td>
                  <td>11</td>
                  <td>6</td>
                  <td>6</td>
                  <td>50%</td>
              </tr>
          </tbody>
      </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
