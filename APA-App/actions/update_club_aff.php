<?php
include '../db/config.php';
session_start();
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id']; 
    $club = trim($_POST['club']);

    // Validate input
    // if (empty($club)) {
    //     echo json_encode(['error' => 'Club affiliations cannot be empty.']);
    //     exit;
    // }

    // Update query
    $query = "UPDATE profiles SET club = ? WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $club, $user_id);

    if ($stmt->execute()) {
        echo json_encode(['success' => 'Club affiliations updated successfully.']);
    } else {
        echo json_encode(['error' => 'Failed to update club affiliations.']);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['error' => 'Invalid request method.']);
}
?>
