<?php
include '../db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the user_id from the POST request
    $user_id = $_POST['user_id'];

    // SQL query to delete the user
    $query = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        // If no rows were affected (user not found or deletion failed)
        echo json_encode(['success' => false, 'error' => 'Failed to delete user.']);
    }

    $stmt->close();
}
?>
