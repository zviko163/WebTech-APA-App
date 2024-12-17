<?php
// Include the database configuration file
include '../db/config.php';

// SQL query to fetch users and their profile data
$sql = "
    SELECT 
        u.user_id, 
        u.username, 
        u.email, 
        u.role_id, 
        p.matches_played, 
        p.won, 
        p.lost, 
        p.win_rate 
    FROM 
        users u
    LEFT JOIN 
        profiles p ON u.user_id = p.user_id
";

// Execute the query
$result = $conn->query($sql);

// Check if results were returned
if ($result->num_rows > 0) {
    $users = [];
    
    // Fetch the data and store in the array
    while ($row = $result->fetch_assoc()) {
        $users[] = [
            'user_id' => $row['user_id'],
            'username' => $row['username'],
            'email' => $row['email'],
            'matches_played' => $row['matches_played'] ?? 0,
            'wins' => $row['won'] ?? 0,
            'losses' => $row['lost'] ?? 0,
            'win_rate' => $row['win_rate'] ?? 0,
            'role_id' => $row['role_id'],
        ];
    }

    // Return the result as a JSON response
    echo json_encode([
        'success' => true,
        'users' => $users
    ]);
} else {
    // No users found
    echo json_encode([
        'success' => false,
        'error' => 'No users found'
    ]);
}

// Close the database connection
$conn->close();
?>
