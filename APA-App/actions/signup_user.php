<?php
include '../db/config.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirmPassword'] ?? '';

    // Validate inputs
    if (empty($username) || empty($email) || empty($password)) {
        echo "<script>alert('All fields are required.'); window.history.back();</script>";
        exit;
    }

    // checking passwords match
    if ($password != $confirmPassword) {
        echo "<script>alert('Passwords do not match.'); window.history.back();</script>";
        exit;
    }
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the email or username already exists
    $check_query = $conn->prepare("SELECT user_id FROM users WHERE email = ? OR username = ?");
    $check_query->bind_param("ss", $email, $username);
    $check_query->execute();
    $check_query->store_result();

    if ($check_query->num_rows > 0) {
        echo "<script>alert('Email or username already exists.'); window.history.back();</script>";
        $check_query->close();
        exit;
    }
    $check_query->close();

    // Insert the user and create profile
    $insert_user = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $insert_user->bind_param("sss", $username, $email, $hashed_password);

    if ($insert_user->execute()) {
        $user_id = $conn->insert_id;
        $insert_profile = $conn->prepare("INSERT INTO profiles (user_id) VALUES (?)");
        $insert_profile->bind_param("i", $user_id);

        // Attempt to execute the prepared statement for inserting the profile
        if ($insert_profile->execute()) {
            // Log success if the profile is created
            // echo "Profile created successfully!";
            header("Location: ../view/login.php");
        }

        $insert_profile->close();

        // header("Location: ../view/login.php");
        exit;
    } else {
        echo "<script>alert('An error occurred. Please try again.'); window.history.back();</script>";
    }

    $insert_profile->close();
    $insert_user->close();
}
?>