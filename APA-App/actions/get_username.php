<?php
session_start();  

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in']);
    exit;
}

include '../db/config.php';

// Fetch the user ID from the session
$user_id = $_SESSION['user_id'];

// Query the database to get the username
$query = "SELECT username FROM users WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id); 
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($username);

if ($stmt->fetch()) {
    echo json_encode(['username' => $username]);
} else {
    echo json_encode(['error' => 'User not found']);
}

$stmt->close();
$conn->close();
?>
