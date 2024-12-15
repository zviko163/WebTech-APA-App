<?php
include '../db/config.php';

// error checking and debugging
error_reporting(E_ALL);
ini_set('display errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;

    // Check if fields are empty
    if (empty($username) || empty($email) || empty($password)) {
        echo json_encode(['username' => $username, 'email' => $email, 'password' => $password]);
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the email already exists
    $check_email_query = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $check_email_query->bind_param("s", $email);
    $check_email_query->execute();
    $check_email_query->store_result();

    if ($check_email_query->num_rows > 0) {
        echo "<script>alert('Email already exists.'); window.history.back();</script>";
        // echo json_encode(['status' => 'error', 'message' => 'Email already exists.']);
        $check_email_query->close();
        exit;
    }
    // Check if the username already exists
    $check_username = $conn->prepare("SELECT user_id FROM users WHERE username = ?");
    $check_username->bind_param("s", $username);
    $check_username->execute();
    $check_username->store_result();
    
    if ($check_username->num_rows > 0) {
        echo "<script>alert('Username taken. Try another one'); window.history.back();</script>";
        // echo json_encode(['status' => 'error', 'message' => 'Username already exists.']);
        $check_username->close();
        exit;
    }

    // Insert the user
    $insert_query = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $insert_query->bind_param("sss", $username, $email, $hashed_password);

    if ($insert_query->execute()) {
        // redirecting user to the login page
        header("Location: ../view/login.php");
        echo json_encode(['status' => 'success', 'message' => 'User registered successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error: ' . $conn->error]);
    }

    // Close statements
    $check_email_query->close();
    $check_username->close();
    $insert_query->close();
}
?>
