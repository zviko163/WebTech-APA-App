<?php
include '../db/config.php';
session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Get the current logged-in admin's username from session
if (isset($_SESSION['username'])) {
    $admin_username = $_SESSION['username'];
} else {
    echo json_encode(['success' => false, 'error' => 'User not logged in.']);
    exit;
}

// Query to fetch statistics from the events table
$query = "SELECT COUNT(*) AS total_events, 
                 SUM(CASE WHEN date >= NOW() THEN 1 ELSE 0 END) AS pending_events 
          FROM events";

// Query to get the count of registered users
$user_count_query = "SELECT COUNT(*) AS total_users FROM users";
$user_count_result = $conn->query($user_count_query);
if ($user_count_result) {
    $user_count_row = $user_count_result->fetch_assoc();
    $total_users = $user_count_row['total_users'];
} else {
    $total_users = 0;
}

// Execute the query
$result = $conn->query($query);
if ($result) {
    $row = $result->fetch_assoc();
    $total_events = $row['total_events'];
    $pending_events = $row['pending_events'];

    // Return the data
    echo json_encode([
        'success' => true,
        'admin_username' => $admin_username,
        'total_events' => $total_events,
        'pending_events' => $pending_events,
        'total_users' => $total_users
    ]);

} else {
    echo json_encode(['success' => false, 'error' => 'Database error.']);
}


$conn->close();
?>
