<?php
session_start();
include '../db/config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch total matches played and win rate
$query = "SELECT matches_played AS total_matches, win_rate FROM profiles WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode([
        'total_matches' => $data['total_matches'],
        'win_rate' => $data['win_rate']
    ]);
} else {
    echo json_encode(['error' => 'No data found']);
}

// Close connections
$stmt->close();
$conn->close();
?>
