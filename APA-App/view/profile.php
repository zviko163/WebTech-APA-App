<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/profile.css">
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
            <a href="events.php" class="nav-link text-dark">Events</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark">Matches</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-dark">Contact Support</a>
          </li>
        </ul>
      </nav>
  
      <!-- Profile Picture Section -->
      <div class="d-flex align-items-center gap-3">
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
  
      <!-- Main Content Area -->
      <main class="container">
        <!-- Profile Section -->
        <div class="profile-header">
            <div class="image-container">
            <div
            class="profile-pic rounded-circle"
            style="
                width: 8rem;
                height: 8rem;
                background-image: url('../assets/images/chalk.jpg');
                background-size: cover;
                background-position: center;
            "
            ></div>
            </div>
            <h2>Michael Scott</h2>
            <p>3.5 - San Francisco, CA</p>
            <p>Member since 2018</p>

            <!-- Profile Buttons -->
            <div class="btn-group d-flex gap-3 justify-content-center mb-4">
                <button class="btn">Challenge</button>
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
            <p>This is the bio section. You can update your personal information here.</p>
            <button class="btn btn-outline-primary d-block mx-auto" onclick="showEditForm('bio')">Edit Bio</button>
            <div id="bio-edit-form" class="edit-form" style="display:none;">
                <h3>Edit Bio</h3>
                <form>
                    <div class="mb-3">
                        <label for="bioInput" class="form-label">New Bio</label>
                        <textarea id="bioInput" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>

        <!-- Achievements Section -->
        <div id="achievements" class="tab-content" style="display:none;">
            <p>This is the achievements section. You can update your achievements here.</p>
            <button class="btn btn-outline-primary d-block mx-auto" onclick="showEditForm('achievements')">Edit Achievements</button>
            <div id="achievements-edit-form" class="edit-form" style="display:none;">
                <h3>Edit Achievements</h3>
                <form>
                    <div class="mb-3">
                        <label for="achievementsInput" class="form-label">New Achievements</label>
                        <textarea id="achievementsInput" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>

        <!-- Club Affiliations Section -->
        <div id="club-affiliations" class="tab-content" style="display:none;">
            <p>This is the club affiliations section. You can update your club affiliations here.</p>
            <button class="btn btn-outline-primary d-block mx-auto" onclick="showEditForm('club-affiliations')">Edit Club Affiliations</button>
            <div id="club-affiliations-edit-form" class="edit-form" style="display:none;">
                <h3>Edit Club Affiliations</h3>
                <form>
                    <div class="mb-3">
                        <label for="clubAffiliationsInput" class="form-label">New Affiliations</label>
                        <textarea id="clubAffiliationsInput" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
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
