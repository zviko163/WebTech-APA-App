<?php
include '../db/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if fields are empty
    if (empty($username) || empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the email already exists
    $check_email_query = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check_email_query->bind_param("s", $email);
    $check_email_query->execute();
    $check_email_query->store_result();

    if ($check_email_query->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Email already exists.']);
        $check_email_query->close();
        exit;
    }

    // Insert the user
    $insert_query = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $insert_query->bind_param("sss", $username, $email, $hashed_password);

    if ($insert_query->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'User registered successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
    }

    // Close statements
    $check_email_query->close();
    $insert_query->close();
}
?>
