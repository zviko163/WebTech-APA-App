<?php
include '../db/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $query = "INSERT INTO users (username, email, password, role_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssss', $username, $email, $password, $role);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $user_id = $conn->insert_id;
        $insert_profile = $conn->prepare("INSERT INTO profiles (user_id) VALUES (?)");
        $insert_profile->bind_param("i", $user_id);
        $insert_profile->execute();
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to add user.']);
    }

    $stmt->close();
}
?>
