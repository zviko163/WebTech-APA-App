<?php

include '../db/config.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])) {
    $event_id = intval($_POST['event_id']);
    $user_id = intval($_SESSION['user_id']); 

    // Check if user is already registered for the event
    $check_sql = "SELECT * FROM event_registrations WHERE event_id = ? AND user_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param('ii', $event_id, $user_id);
    $stmt->execute();
    $check_result = $stmt->get_result();

    if ($check_result->num_rows > 0) {
        echo "<script>
            alert('You have already RSVP’d for this event.');
            window.location.href = '../view/events.php';  // Redirect to events page after alert
        </script>";
    }

    // Register the user for the event
    $sql = "INSERT INTO event_registrations (event_id, user_id, registered_at) VALUES (?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $event_id, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'RSVP successful!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to RSVP. Please try again.']);
    }

    exit;
}
