<?php
include '../db/config.php';
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $bio = trim($_POST['bio']);  

    // Validate input
    // if (empty($bio)) {
    //     echo json_encode(['error' => 'Bio cannot be empty.']);
    //     exit;
    // }

    // Update query
    $query = "UPDATE profiles SET bio = ? WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $bio, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Bio updated successfully.']);
    } else {
        echo json_encode(['error' => 'Failed to update bio.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
