<?php
include '../db/config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Decode input data
$data = json_decode(file_get_contents("php://input"), true);

// Check input validity
if (isset($data['match_id'], $data['winner_id'])) {
    $match_id = $data['match_id'];
    $winner_id = $data['winner_id'];

    // Validate that winner exists in the users table
    $check_winner = $conn->prepare("SELECT user_id FROM users WHERE user_id = ?");
    $check_winner->bind_param("i", $winner_id);
    $check_winner->execute();
    $check_winner->store_result();

    if ($check_winner->num_rows == 0) {
        echo json_encode(['success' => false, 'error' => 'Winner does not exist.']);
        $check_winner->close();
        exit;
    }
    $check_winner->close();

    // Update the matches table
    $update_winner = $conn->prepare("UPDATE matches SET winner = ?, status = 'completed' WHERE match_id = ?");
    $update_winner->bind_param("ii", $winner_id, $match_id);

    if ($update_winner->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Database error.']);
    }
    $update_winner->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid input data.']);
}
$conn->close();
?>
