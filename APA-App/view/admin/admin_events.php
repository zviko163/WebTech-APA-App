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
    <link rel="stylesheet" href="../../assets/css/events.css">
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
                    <img src="../../assets/images/CLUB TOUR 2024(1)(1).png" class="card-img-top" alt="Competition 1">
                    <div class="card-body">
                        <h5 class="card-title">2024 Clubs Open 8-Ball</h5>
                        <p class="card-text">Ashesi, APA</p>
                        <a href="#" class="btn btn-primary">RSVP</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="../../assets/images/doubles_flyer.jpg" class="card-img-top" alt="Competition 2">
                    <div class="card-body">
                        <h5 class="card-title">2024 Doubles Tournament</h5>
                        <p class="card-text">Ashesi, APA</p>
                        <a href="#" class="btn btn-primary">RSVP</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="../../assets/images/individuals_winners.jpg" class="card-img-top" alt="Competition 3">
                    <div class="card-body">
                        <h5 class="card-title">2024 Individuals Tournament</h5>
                        <p class="card-text">The Hill, Arkono</p>
                        <a href="#" class="btn btn-primary">RSVP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Create Event Button -->
    <div class="text-center mt-5">
        <button class="btn btn-lg btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#createEventForm" aria-expanded="false" aria-controls="createEventForm">
            + Create Event
        </button>
    </div>

    <!-- Create Event Form -->
    <div class="collapse mt-4" id="createEventForm">
        <div class="card card-body">
            <form>
                <div class="mb-3">
                    <label for="eventName" class="form-label">Event Name</label>
                    <input type="text" class="form-control" id="eventName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="eventVenue" class="form-label">Venue</label>
                    <input type="text" class="form-control" id="eventVenue" name="venue" required>
                </div>
                <div class="mb-3">
                    <label for="eventDate" class="form-label">Date</label>
                    <input type="date" class="form-control" id="eventDate" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="eventDescription" class="form-label">Description</label>
                    <textarea class="form-control" id="eventDescription" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="eventCapacity" class="form-label">Capacity</label>
                    <input type="number" class="form-control" id="eventCapacity" name="capacity" required>
                </div>
                <div class="mb-3">
                    <label for="eventPrize" class="form-label">Prize</label>
                    <input type="text" class="form-control" id="eventPrize" name="prize">
                </div>
                <div class="mb-3">
                    <label for="eventPicture" class="form-label">Event Picture</label>
                    <input type="file" class="form-control" id="eventPicture" name="event_picture" accept="image/*">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Event</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center p-4 bg-light">
        <!-- Partnership Text Section -->
        <div class="d-flex justify-content-center align-items-center mb-3">
            <!-- First Logo: USTUN -->
            <div class="d-flex align-items-center mx-3">
                <img src="../../assets/images/ustun_logo.jpg" alt="Logo" style="width: 40px; height: 40px; object-fit: cover;" class="rounded-circle me-2">
                <span>USTUN</span>
            </div>
            <!-- Second Logo: ASC -->
            <div class="d-flex align-items-center mx-3">
                <img src="../../assets/images/asc_logo.jpg" alt="Logo" style="width: 40px; height: 40px; object-fit: cover;" class="rounded-circle me-2">
                <span>ASC</span>
            </div>
        </div>

        <!-- Social Media Icons -->
        <div class="d-flex justify-content-center mb-3">
            <!-- WhatsApp Icon -->
            <a href="https://chat.whatsapp.com/GqWz76Nrg7BCslbCbs47bv" target="_blank" class="mx-3">
                <i class="bi bi-whatsapp" style="font-size: 32px; color: #25D366;"></i>
            </a>
            <!-- Instagram Icon -->
            <a href="https://www.instagram.com/ashesi_pool_association/profilecard/?igsh=MTN1YTFpMWhoOGs2MQ==" target="_blank" class="mx-3">
                <i class="bi bi-instagram" style="font-size: 32px; color: #E4405F;"></i>
            </a>
        </div>

        <!-- Copyright Text -->
        <p>&copy; 2024 Ashesi Pool Association. All Rights Reserved.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>