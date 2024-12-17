<?php

include '../db/config.php';


// Check if the user_id is provided in the query string
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // SQL query to fetch the user and their profile data based on user_id
    $sql = "
        SELECT 
            u.user_id, 
            u.username, 
            u.email, 
            u.role_id, 
            p.bio, 
            p.picture, 
            p.club, 
            p.matches_played, 
            p.won, 
            p.lost, 
            p.win_rate 
        FROM 
            users u
        LEFT JOIN 
            profiles p ON u.user_id = p.user_id
        WHERE 
            u.user_id = ?
    ";

    // Prepare statement to prevent SQL injection
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $user_id);  
        $stmt->execute();  

        // Get the result
        $result = $stmt->get_result();

        // Check if a user is found
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo json_encode([
                'success' => true,
                'user' => $user
            ]);
        } else {
            // No user found with the provided user_id
            echo json_encode([
                'success' => false,
                'error' => 'User not found'
            ]);
        }

        $stmt->close();  
    } else {
        // If the query preparation fails
        echo json_encode([
            'success' => false,
            'error' => 'Failed to prepare the SQL query'
        ]);
    }
} else {
    // If user_id is not provided
    echo json_encode([
        'success' => false,
        'error' => 'No user_id provided'
    ]);
}

$conn->close();
?>
