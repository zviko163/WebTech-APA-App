<?php
include '../db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the POST request
    $user_id = $_POST['user_id'];
    $role_id = $_POST['role'];  // We are receiving the role_id, not the role_name

    // SQL query to update the user's role
    $query = "UPDATE users SET role_id = ? WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ii', $role_id, $user_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to update user role.']);
    }

    $stmt->close();
}
?>
