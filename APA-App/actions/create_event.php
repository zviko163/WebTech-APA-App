<?php
include '../db/config.php'; // Include your database connection file

// debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Enable JSON responses
header('Content-Type: application/json');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode JSON input
    $data = json_decode(file_get_contents("php://input"), true);

    // Extract values from JSON data
    $name = $data['name'] ?? '';
    $venue = $data['venue'] ?? '';
    $date = $data['date'] ?? '';
    $description = $data['description'] ?? '';
    $capacity = $data['capacity'] ?? 0;
    $prize = $data['prize'] ?? '';
    $created_at = date('Y-m-d H:i:s');

    // Validate required fields
    if (empty($name) || empty($venue) || empty($date) || empty($description) || empty($capacity)) {
        echo json_encode(['success' => false, 'error' => 'All fields except prize are required.']);
        exit;
    }

    $event_picture = 'chalk.jpg'; // Default placeholder image filename

    // Insert event data into the database
    try {
        $stmt = $conn->prepare("INSERT INTO events (name, venue, date, description, capacity, created_at, prize, event_picture) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssisss", $name, $venue, $date, $description, $capacity, $created_at, $prize, $event_picture);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Event created successfully!']);
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to create event.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
$conn->close();
?>
