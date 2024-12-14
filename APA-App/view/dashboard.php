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
            <a href="#" class="nav-link text-dark">Ladders</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark">Tournaments</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark">Leagues</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark">Matches</a>
          </li>
        </ul>
      </nav>
  
      <!-- Profile Section -->
      <div class="d-flex align-items-center gap-3">
        <button class="btn btn-create px-4">Profile</button>
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
      <h3>Welcome, Jack</h3>
      <!-- <h5 class="text-muted">Place a challenge</h5> -->
    </section>
  
    <!-- Statistics Section -->
    <section class="row text-center mb-4">
      <!-- Total Matches Played -->
      <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm p-3">
          <h5>Total Matches Played</h5>
          <h2 class="text-primary">42</h2>
        </div>
      </div>
  
      <!-- Win Rate -->
      <div class="col-12 col-md-6 mb-3">
        <div class="card shadow-sm p-3">
          <h5>Win Rate</h5>
          <h2 class="text-success">75%</h2>
        </div>
      </div>
    </section>
  
    <!-- Match Challenges html -->
    <section class="container-fluid">
      <!-- Recent Challenge -->
      <section class="mt-4">
        <h5 class="text-dark">Challenges</h5>
        <div class="challenge-card d-flex align-items-center justify-content-between p-3 shadow-sm">
          <div class="d-flex align-items-center gap-3">
            <div class="icon">
              <svg width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="..." />
              </svg>
            </div>
            <div>
              <h6 class="mb-0">John Doe challenged you to a match!</h6>
              <p class="text-muted mb-0">5 minutes ago</p>
            </div>
          </div>
          <div class="d-flex gap-2">
            <button class="btn btn-approve">Approve</button>
            <button class="btn btn-decline">Decline</button>
          </div>
        </div>
      </section>
  
      <!-- Upcoming Matches -->
      <section class="mt-4">
        <h5 class="text-dark">Upcoming Matches</h5>
        <div class="challenge-card d-flex align-items-center justify-content-between p-3 shadow-sm">
          <div class="d-flex align-items-center gap-3">
            <div class="icon">
              <svg width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="..." />
              </svg>
            </div>
            <div>
              <h6 class="mb-0">Match against Team Alpha</h6>
              <p class="text-muted mb-0">Scheduled for tomorrow at 3 PM</p>
            </div>
          </div>
          <button class="btn btn-create">View Details</button>
        </div>
      </section>
    </section>
  </main>
  

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
