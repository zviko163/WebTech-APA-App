<?php
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>


<?php
// Fetch user ID from session
// session_start();
$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
?>
<script>
// Pass PHP variable to JavaScript
const userId = <?php echo $user_id; ?>;
const username = "<?php echo $username; ?>";  
const email = "<?php echo $email; ?>";
// challenge
</script>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/profile.css">
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
  
      <!-- Profile Picture Section -->
      <div class="d-flex align-items-center gap-3">
      <div
        class="profile-pic rounded-circle"
        id="profilePicHeader" 
        style="width: 40px; height: 40px; background-size: cover; background-position: center;"
      ></div>
      </div>
    </div>
  </header>
  
      <!-- Main Content Area -->
      <main class="container">
        <!-- Profile Section -->
        <div class="profile-header">
            <div class="image-container">
            <div
              class="profile-pic rounded-circle"
              id="profilePicMain"
              style="width: 8rem; height: 8rem; background-size: cover; background-position: center;"
            ></div>
            </div>
            <h2 id="username"></h2>
            <p>Ashesi University</p>
            <p id="email"></p>

            <!-- Profile Buttons -->
            <div class="btn-group d-flex gap-3 justify-content-center mb-4">
                <button id="logoutButton" class="btn">Logout</button>
                <button class="btn btn-message" data-bs-toggle="modal" data-bs-target="#profileModal">Update Profile</button>
            </div>
        </div>

        <!-- Profile Tabs -->
        <div class="profile-tabs text-center mb-4">
            <a href="#" class="tab-link active" onclick="setActiveTab(event, 'bio')">Bio</a>
            <a href="#" class="tab-link" onclick="setActiveTab(event, 'achievements')">Achievements</a>
            <a href="#" class="tab-link" onclick="setActiveTab(event, 'club-affiliations')">Club Affiliations</a>
        </div>

        <!-- Bio Section -->
        <div id="bio" class="tab-content">
            <!-- Dynamic content will be injected here by profile.js -->
        </div>

        <!-- Achievements Section -->
        <div id="achievements" class="tab-content" style="display:none"></div>

        <!-- Club Affiliations Section -->
        <div id="club-affiliations" class="tab-content" style="display:none;">
            <!-- Dynamic content will be injected here by profile.js -->
        </div>

        <!-- Profile Update Modal -->
        <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Update Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="profilePicture" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" id="profilePicture">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" value="MichaelScott" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                    </div>
                </div>
            </div>
        </div>


    </main>

  

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/profile.js"></script>
</body>

</html>
