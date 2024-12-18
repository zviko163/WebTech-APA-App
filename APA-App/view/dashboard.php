<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/dashboard.css">

</head>

<body>
  <header class="header navbar navbar-expand-md bg-light p-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <!-- Logo Section -->
      <div class="d-flex align-items-center gap-3">
        <!-- Logo -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" fill="black"/>
            <circle cx="12" cy="12" r="6" fill="white"/>
            <text x="12" y="16" font-size="6" font-family="Arial" font-weight="bold" text-anchor="middle" fill="black">8</text>
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
            <a href="challenges.php" class="nav-link text-dark">Challenge</a>
          </li>
          <li class="nav-item">
            <a href="support.php" class="nav-link text-dark">Contact Support</a>
          </li>
        </ul>
      </nav>
  
      <!-- Profile Section -->
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
  

  <main class="container-fluid mt-4">
    <!-- Welcome Section -->
    <section class="welcome-section text-center mb-4">
      <h3 id="welcomeMessage">
          Welcome, <?= htmlspecialchars($_SESSION['username'] ?? 'Guest') ?>
      </h3>
      <!-- <h5 class="text-muted">Place a challenge</h5> -->
    </section>
  
    <!-- Statistics Section -->
    <section class="row text-center mb-4">
      <!-- Total Matches Played -->
      <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm p-3">
          <h5>Total Matches Played</h5>
          <h2 id="totalMatches" class="text-primary">0</h2>
        </div>
      </div>
  
      <!-- Win Rate -->
      <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm p-3">
          <h5>Win Rate</h5>
          <h2 id="winRate" class="text-success">0%</h2>
        </div>
      </div>
    </section>
  
    <!-- Match Challenges html -->
    <section class="container-fluid">
      <!-- Recent Challenge -->
      <section class="mt-4">
        <h5 class="text-dark">Challenges</h5>
        <div class="challenges-section"></div>
        <div id="matchDetailsPopup" class="popup hidden">
          <div class="popup-content">
            <h5 class="popup-title">Match Details</h5>
            <p id="matchTime"></p>
            <p class="popup-message">Communicate with your opponent to confirm availability and logistics for the match.</p>
            <button class="btn btn-close" id="closePopup"></button>
          </div>
        </div>
      </section>
  
      <!-- Upcoming Matches -->
      <section class="mt-4">
        <h5 class="text-dark">Upcoming Matches</h5>
        <div class="upcoming-matches-container"></div>
      </section>
    </section>
  </main>
  

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Custom JS -->
  <script src="../assets/js/dashboard_script.js"></script>
</body>

</html>
