<?php

include '../db/config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
header('Content-Type: application/json');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'User not logged in.']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Retrieve and decode JSON input
$data = json_decode(file_get_contents('php://input'), true);

if (!$data) {
    echo json_encode(['error' => 'Invalid JSON input.']);
    exit;
}

// Check if the username or password are provided
if (empty($data['username']) && empty($data['password'])) {
    echo json_encode(['error' => 'Please provide either a new username or password to update.']);
    exit;
}

// Update username if provided
if (isset($data['username'])) {
    $username = trim($data['username']);

    // Check if the new username is unique
    $query = "SELECT user_id FROM users WHERE username = ? AND user_id != ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $username, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['error' => 'Username is already taken.']);
        exit;
    }

    // Update username in the database
    $updateQuery = "UPDATE users SET username = ? WHERE user_id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("si", $username, $user_id);

    if (!$updateStmt->execute()) {
        echo json_encode(['error' => 'Failed to update username.']);
        exit;
    }
}

// Update password if provided
if (isset($data['password'])) {
    $password = trim($data['password']);

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Update password in the database
    $updateQuery = "UPDATE users SET password = ? WHERE user_id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("si", $hashed_password, $user_id);

    if (!$updateStmt->execute()) {
        echo json_encode(['error' => 'Failed to update password.']);
        exit;
    }
}

echo json_encode(['success' => 'Profile updated successfully.']);

$updateStmt->close();
$conn->close();
?>
