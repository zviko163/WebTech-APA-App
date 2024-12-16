<?php
include '../db/config.php'; 

// SQL query to retrieve the top 20 players with the highest win rate
$sql = "
    SELECT 
        u.username AS player_name,
        p.matches_played,
        p.won,
        p.lost,
        p.win_rate
    FROM 
        profiles p
    INNER JOIN 
        users u
    ON 
        p.user_id = u.user_id
    ORDER BY 
        p.win_rate DESC
    LIMIT 20;
";


// Execute the query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Initialize rank counter
    $rank = 1;

    // Fetch and display the data
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $rank++ . "</td>";
        echo "<td>" . htmlspecialchars($row['player_name']) . "</td>"; 
        echo "<td>" . $row['matches_played'] . "</td>"; 
        echo "<td>" . $row['won'] . "</td>"; 
        echo "<td>" . $row['lost'] . "</td>"; 
        echo "<td>" . number_format($row['win_rate'], 2) . "%</td>"; 
        echo "</tr>";
    }
} else {
    // No data found
    echo "<tr><td colspan='6'>No players found.</td></tr>";
}

// Close the database connection
$conn->close();
?>
