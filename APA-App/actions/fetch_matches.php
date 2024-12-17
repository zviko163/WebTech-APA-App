<?php
include '../db/config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Query to fetch the match data along with challenger and challenged IDs
$query = "SELECT m.match_id, m.schedule_date, c1.user_id AS challenger_id, c2.user_id AS challenged_id,
          c1.username AS challenger, c2.username AS challenged
          FROM matches m
          JOIN users c1 ON m.challenger_id = c1.user_id
          JOIN users c2 ON m.challenged_id = c2.user_id
          WHERE m.status = 'scheduled'";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $matches = [];
    while ($row = $result->fetch_assoc()) {
        $matches[] = [
            'match_id' => $row['match_id'],
            'challenger' => $row['challenger'],
            'challenger_id' => $row['challenger_id'],
            'challenged' => $row['challenged'],
            'challenged_id' => $row['challenged_id'],
            'schedule_date' => $row['schedule_date']
        ];
    }
    echo json_encode(['success' => true, 'matches' => $matches]);
} else {
    echo json_encode(['success' => false, 'error' => 'No matches found.']);
}

$conn->close();
?>
