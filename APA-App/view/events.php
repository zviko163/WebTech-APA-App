<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700;900&family=Noto+Sans:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/events.css">
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
    <br>
    <!-- Hero Section -->
    <section class="hero"></section>
    <br>

    <!-- Upcoming Competitions -->
    <div class="container mt-5">
        <h2>Upcoming Competitions</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="../assets/images/CLUB TOUR 2024(1)(1).png" class="card-img-top" alt="Competition 1">
                    <div class="card-body">
                        <h5 class="card-title">2024 Clubs Open 8-Ball</h5>
                        <p class="card-text">Ashesi, APA</p>
                        <a href="#" class="btn btn-primary">RSVP</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="../assets/images/doubles_flyer.jpg" class="card-img-top" alt="Competition 2">
                    <div class="card-body">
                        <h5 class="card-title">2024 Doubles Tournament</h5>
                        <p class="card-text">Ashesi, APA</p>
                        <a href="#" class="btn btn-primary">RSVP</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="../assets/images/individuals_winners.jpg" class="card-img-top" alt="Competition 3">
                    <div class="card-body">
                        <h5 class="card-title">2024 Individuals Tournament</h5>
                        <p class="card-text">The Hill, Arkono</p>
                        <a href="#" class="btn btn-primary">RSVP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <a>Some Ustun and ASC partnerships here</a>
        <br><br>
        <p>&copy; 2024 Pool Association. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
