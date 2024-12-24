<?php

include '../db/config.php';
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
header('Content-Type: application/json');

// Correcting the variable to access the session
$user_id = $_SESSION['user_id'];

// Query to retrieve the bio, club affiliations, and achievements
$query = "
    SELECT 
        p.bio, 
        p.picture, 
        p.club, 
        GROUP_CONCAT(a.award_name ORDER BY a.award_name ASC) AS achievements
    FROM profiles p
    LEFT JOIN user_awards ua ON p.user_id = ua.user_id
    LEFT JOIN awards a ON ua.award_id = a.award_id
    WHERE p.user_id = ?
    GROUP BY p.user_id, p.bio, p.picture, p.club
";


$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch profile data
if ($row = $result->fetch_assoc()) {
    echo json_encode([
        'bio' => $row['bio'],
        'club' => $row['club'],
        'achievements' => $row['achievements'] ? explode(',', $row['achievements']) : [],
        'picture' => $row['picture']
    ]);
} else {
    echo json_encode(['error' => 'User profile not found']);
}

$stmt->close();
$conn->close();
?>
