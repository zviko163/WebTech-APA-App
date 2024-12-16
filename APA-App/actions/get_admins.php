<?php
include '../db/config.php'; 

// SQL query to retrieve admin users
$sql = "
    SELECT 
        user_id,
        username,
        email
    FROM 
        users
    WHERE 
        role_id = 1
    ORDER BY 
        username ASC
";

// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch and display the data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['username']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars("Admin") . "</td>";
        echo "</tr>";
    }
} else {
    // No data found
    echo "<tr><td colspan='4'>No admin users found.</td></tr>";
}

// Close the database connection
$conn->close();
?>
