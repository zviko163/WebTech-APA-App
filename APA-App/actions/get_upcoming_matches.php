<?php
session_start();
include '../db/config.php';

$user_id = $_SESSION['user_id']; 

$query = "
    SELECT 
        m.match_id, 
        m.schedule_date,
        CASE 
            WHEN m.challenger_id = ? THEN u2.username 
            WHEN m.challenged_id = ? THEN u1.username 
        END AS opponent_name
    FROM matches m
    INNER JOIN users u1 ON m.challenger_id = u1.user_id
    INNER JOIN users u2 ON m.challenged_id = u2.user_id
    WHERE m.status = 'scheduled' AND (m.challenger_id = ? OR m.challenged_id = ?)
    ORDER BY m.schedule_date ASC;
";

$stmt = $conn->prepare($query);
$stmt->bind_param("iiii", $user_id, $user_id, $user_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
