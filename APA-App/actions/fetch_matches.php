<?php
include '../db/config.php';
header('Content-Type: application/json');

// Prepare SQL query to fetch matches and join with users table
$fetch_query = $conn->prepare("
    SELECT 
        m.match_id, 
        u1.username AS challenger_name, 
        u2.username AS challenged_name,
        m.schedule_date
    FROM matches m
    JOIN users u1 ON m.challenger_id = u1.user_id
    JOIN users u2 ON m.challenged_id = u2.user_id
    WHERE m.winner IS NULL
");

$fetch_query->execute();
$result = $fetch_query->get_result();

$matches = [];
while ($row = $result->fetch_assoc()) {
    $matches[] = [
        'match_id' => $row['match_id'],
        'challenger' => htmlspecialchars($row['challenger_name']),
        'challenged' => htmlspecialchars($row['challenged_name']),
        'schedule_date' => htmlspecialchars($row['schedule_date'])
    ];
}

echo json_encode(['success' => true, 'matches' => $matches]);
$fetch_query->close();
$conn->close();
exit();
?>
