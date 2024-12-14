<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Ashesi Pool Association</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Be Vietnam Pro', 'Noto Sans', sans-serif;
            background-color: #fbf9f9;
        }

        /* Profile Section */
        .profile-header {
            text-align: center;
            margin-top: 40px;
        }

        .profile-header .image-container {
            display: inline-block;
            width: 128px;
            height: 128px;
            border-radius: 50%;
            background-image: url('https://cdn.usegalileo.ai/sdxl10/36e9312a-0824-421c-b7e1-226579283a22.png');
            background-size: cover;
            background-position: center;
        }

        .profile-header h2 {
            font-size: 22px;
            font-weight: bold;
            color: #181111;
            margin-top: 10px;
        }

        .profile-header p {
            font-size: 14px;
            color: #895d5e;
        }

        .profile-header .btn-group button {
            background-color: #f1eaea;
            border-radius: 10px;
            padding: 10px;
            font-weight: bold;
            flex: 1;
        }

        .profile-header .btn-group .btn-message {
            background-color: #d58889;
        }

        /* Profile Tabs */
        .profile-tabs {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            margin-bottom: 30px;
        }

        .profile-tabs a {
            font-size: 14px;
            font-weight: bold;
            padding: 15px 0;
            text-align: center;
            flex: 1;
            color: #895d5e;
        }

        .profile-tabs a.active {
            border-bottom: 3px solid #d58889;
            color: #181111;
        }

        /* Profile Content */
        .profile-content {
            margin-top: 40px;
        }

        .card {
            width: 100%;
            margin-top: 20px;
        }

        .card h5 {
            font-size: 18px;
            font-weight: bold;
            color: #181111;
        }

        .card p {
            font-size: 14px;
            color: #895d5e;
        }

        /* Center alignment of overview, matches, and statistics */
        .section-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #181111;
            margin-bottom: 30px;
        }

        /* Main Content Styling */
        main {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <header class="header navbar navbar-expand-md bg-light p-3">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <svg width="32" height="32" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="..." />
                </svg>
                <h2 class="mb-0">Ashesi Pool Association</h2>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <nav class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-3">
                    <li class="nav-item"><a href="dashboard.php" class="nav-link text-dark">Dashboard</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-dark">Ladders</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-dark">Tournaments</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-dark">Leagues</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-dark">Matches</a></li>
                </ul>
            </nav>
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-create px-4">Profile</button>
                <div class="profile-pic rounded-circle"
                    style="background-image: url('../assets/images/chalk.jpg');"></div>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="container">
        <!-- Profile Section -->
        <div class="profile-header">
            <div class="image-container"></div>
            <h2>Michael Scott</h2>
            <p>3.5 - San Francisco, CA</p>
            <p>Member since 2018</p>

            <!-- Profile Buttons -->
            <div class="btn-group d-flex gap-3 mb-4">
                <button class="btn">Challenge</button>
                <button class="btn btn-message">Message</button>
            </div>
        </div>

        <!-- Profile Tabs -->
        <div class="profile-tabs">
            <a href="#" class="active">Overview</a>
            <a href="#">Matches</a>
            <a href="#">Statistics</a>
        </div>

        <!-- Profile Content -->
        <div class="profile-content">
            <div class="section-header">Overview</div>
            <p>This is the overview section. Information about the player can be found here, including bio, achievements, and additional details.</p>

            <div class="section-header">Matches</div>
            <div class="d-flex justify-content-center gap-4">
                <div class="card">
                    <h5 class="card-title">Match 1</h5>
                    <p class="card-text">Date: 2024-01-01</p>
                    <p class="card-text">Opponent: Jim Halpert</p>
                    <p class="card-text">Result: Win</p>
                </div>
                <div class="card">
                    <h5 class="card-title">Match 2</h5>
                    <p class="card-text">Date: 2024-02-15</p>
                    <p class="card-text">Opponent: Dwight Schrute</p>
                    <p class="card-text">Result: Loss</p>
                </div>
            </div>

            <div class="section-header">Statistics</div>
            <p>This is where the player's performance statistics will be shown. You can include stats like win rate, average score, and more.</p>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
