<?php

include '../db/config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;

    // Check if fields are empty
    if (empty($email) || empty($password)) {
        echo "<script>alert('Both fields are required.'); window.history.back();</script>";
        exit;
    }

    // Prepare query to fetch user details
    $query = $conn->prepare("SELECT user_id, username, role_id, password FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $query->store_result();

    if ($query->num_rows === 1) {
        // Fetch the user data
        $query->bind_result($user_id, $username, $role_id, $hashed_password);
        $query->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Set session variables
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['role_id'] = $role_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            // Redirect to the dashboard
            header("Location: ../view/dashboard.php");
            exit;
        } else {
            // Incorrect password
            echo "<script>alert('Invalid email or password.'); window.history.back();</script>";
            exit;
        }
    } else {
        // Email not found
        echo "<script>alert('Invalid email or password.'); window.history.back();</script>";
        exit;
    }

    // Close statement
    $query->close();
} else {
    // If accessed via a method other than POST
    echo "<script>alert('Invalid request method.'); window.history.back();</script>";
    exit;
}
?>
