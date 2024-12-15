<?php
session_start();
include '../db/config.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT m.match_id, m.challenger_id, m.schedule_date, u.username AS challenger_name
        FROM matches m
        INNER JOIN users u ON m.challenger_id = u.user_id
        WHERE m.status = 'pending' AND m.challenged_id = ?
        ORDER BY m.schedule_date DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
?>
