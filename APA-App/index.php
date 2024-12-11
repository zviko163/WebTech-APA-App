<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APA</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700;900&family=Noto+Sans:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/homestyle.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Ashesi Pool Association</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Competitions</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">King of the Hill</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Rankings</a></li>
                    <li class="nav-item"><a class="nav-link" href="view/signup.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to the Pool Association</h1>
        <p>All 8 ball pool from Ashesi to the world.</p>
    </section>
    <br>
    <section class="welcomes">
        <h1>Know us better</h1>
    </section>


    <!-- Vertical Scrolling Section -->
    <div class="container vertical-section">
        <div class="vertical-card">
            <h5>Achievements</h5>
            <p>Recognizing excellence in pool sports with awards and accolades.</p>
        </div>
    </div>


    <!-- Previous Competitions -->
    <div class="container mt-5">
        <h2>Previous Competitions</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/images/CLUB TOUR 2024(1)(1).png" class="card-img-top" alt="Competition 1">
                    <div class="card-body">
                        <h5 class="card-title">2024 Clubs Open 8-Ball</h5>
                        <p class="card-text">Ashesi, APA</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/images/doubles_flyer.jpg" class="card-img-top" alt="Competition 2">
                    <div class="card-body">
                        <h5 class="card-title">2024 Doubles Tournament</h5>
                        <p class="card-text">Ashesi, APA</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="assets/images/individuals_winners.jpg" class="card-img-top" alt="Competition 3">
                    <div class="card-body">
                        <h5 class="card-title">2024 Individuals Tournament</h5>
                        <p class="card-text">The Hill, Arkono</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container vertical-section" style="width: 50%;">
        <div class="vertical-card" style="display: flex; flex-direction: column; align-items: center;">
            <h5>LIKE US ALREADY?</h5>
            <p>You are more than welcome to be one of us. Sign up in the navigation bar!</p>
            <a href="view/signup.php">Sign Up</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <a>Some Ustun and ASC partnerships here</a>
        <br><br>
        <p>&copy; 2024 Pool Association. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
