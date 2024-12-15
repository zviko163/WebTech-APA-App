<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700;900&family=Noto+Sans:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/leaderboard.css">
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
                    <a href="admindash.php" class="nav-link text-dark">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="users.php" class="nav-link text-dark">Users</a>
                </li>
                <li class="nav-item">
                    <a href="admin_events.php" class="nav-link text-dark">Events</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark">Matches</a>
                </li>
            </ul>
        </nav>
    
        <!-- Profile Picture Section -->
        <div class="d-flex align-items-center gap-3">
        <button class="btn btn-create px-4" onclick="window.location.href = '../profile.php'">Profile</button>
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

    <!-- Users Management -->
    <div class="container mt-5">
        <h2>Manage Users</h2>
        <!-- Users Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Matches Played</th>
                    <th>Wins</th>
                    <th>Win Rate (%)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>JohnDoe</td>
                    <td>20</td>
                    <td>15</td>
                    <td>75%</td>
                    <td>
                        <button class="btn btn-sm btn-primary me-2" data-bs-toggle="collapse" data-bs-target="#editUserForm1">
                            Edit
                        </button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>JaneDoe</td>
                    <td>10</td>
                    <td>5</td>
                    <td>50%</td>
                    <td>
                        <button class="btn btn-sm btn-primary me-2" data-bs-toggle="collapse" data-bs-target="#editUserForm2">
                            Edit
                        </button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Edit User Form (Dropdown for User 1) -->
        <div class="collapse mt-3" id="editUserForm1">
            <div class="card card-body">
                <h5>Edit User Role</h5>
                <form action="edit_user.php" method="POST">
                    <input type="hidden" name="user_id" value="1">
                    <div class="mb-3">
                        <label for="userRole1" class="form-label">Role</label>
                        <select class="form-select" id="userRole1" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>

        <!-- Add User Button -->
        <div class="text-center mt-5">
            <button class="btn btn-lg btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#addUserForm">
                + Add User
            </button>
        </div>

        <!-- Add User Form -->
        <div class="collapse mt-4" id="addUserForm">
            <div class="card card-body">
                <h5>Add User</h5>
                <form>
                    <div class="mb-3">
                        <label for="addUsername" class="form-label">Username</label>
                        <input type="text" class="form-control" id="addUsername" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="addEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="addEmail" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="addPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="addPassword" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirmpassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="addRole" class="form-label">Role</label>
                        <select class="form-select" id="addRole" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
