<?php
include '../db/config.php';  // Include database connection
session_start();  

// Fetch upcoming events (date greater than current time)
$current_time = date('Y-m-d H:i:s');  // Get the current date and time
$query = "SELECT * FROM events WHERE date > ? ORDER BY date ASC";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $current_time);  // Bind the current time to the query
$stmt->execute();
$result = $stmt->get_result();

// Fetch all events into an array
$upcoming_events = [];
while ($event = $result->fetch_assoc()) {
    $upcoming_events[] = $event;
}
?>



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
        <button class="btn btn-create px-4" onclick="window.location.href = 'profile.php'">Profile</button>
            <div
            class="profile-pic rounded-circle"
            style="
                width: 40px;
                height: 40px;
                background-image: url('<?php echo $_SESSION['picture'] ?? '../assets/images/chalk.jpg'; ?>');
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
    <?php
    include '../actions/process_rsvp.php'
    ?>
    <!-- Upcoming Competitions -->
    <div class="container mt-5">
        <h2>Upcoming Competitions</h2>
        <div class="row">
            <?php if (!empty($upcoming_events)): ?>
                <?php foreach ($upcoming_events as $event): ?>
                    <div class="col-md-4">
                        <div class="card">
                            <img src="../assets/images/<?php echo $event['event_picture']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($event['name']); ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($event['name']); ?></h5>
                                <p class="card-text">Venue: <?php echo htmlspecialchars($event['venue']); ?></p>
                                <p class="card-text">Date: <?php echo htmlspecialchars($event['date']); ?></p>
                                    
                                <!-- RSVP Button -->
                                <button 
                                    class="btn btn-primary rsvp-btn" 
                                    data-event-id="<?php echo $event['event_id']; ?>">
                                    RSVP
                                </button>
                                <div class="status-message" style="margin-top: 10px; color: green;"></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No upcoming competitions at the moment.</p>
            <?php endif; ?>
        </div>
    </div>

    <footer class="text-center p-4 bg-light">
        <!-- Partnership Text Section -->
        <div class="d-flex justify-content-center align-items-center mb-3">
            <!-- First Logo: USTUN -->
            <div class="d-flex align-items-center mx-3">
                <img src="../assets/images/ustun_logo.jpg" alt="Logo" style="width: 40px; height: 40px; object-fit: cover;" class="rounded-circle me-2">
                <span>USTUN</span>
            </div>
            <!-- Second Logo: ASC -->
            <div class="d-flex align-items-center mx-3">
                <img src="../assets/images/asc_logo.jpg" alt="Logo" style="width: 40px; height: 40px; object-fit: cover;" class="rounded-circle me-2">
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
    <script>
        document.querySelectorAll('.rsvp-btn').forEach(button => {
        button.addEventListener('click', async function () {
            const eventId = this.getAttribute('data-event-id'); // Get event ID from button
            const statusMessage = this.nextElementSibling; // Placeholder for the status message

            // Clear previous messages
            statusMessage.textContent = '';
            statusMessage.style.color = '';

            try {
                // Send RSVP request
                const response = await fetch('../actions/process_rsvp.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `event_id=${eventId}`
                });

                // Parse JSON response
                const result = await response.json();

                // Update status message based on the result
                if (result.status === 'success') {
                    statusMessage.textContent = result.message;
                    statusMessage.style.color = 'green';
                } else {
                    statusMessage.textContent = result.message;
                    statusMessage.style.color = 'red';
                }
            } catch (error) {
                statusMessage.textContent = 'You already RSVP`d for this event.';
                statusMessage.style.color = 'red';
                console.error(error);
            }
        });
    });

    </script>
</body>

</html>
