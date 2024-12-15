<?php
include '../db/config.php';

$match_id = $_POST['match_id'];
$action = $_POST['action']; // 'approve' or 'decline'

if ($action === 'approve') {
    $sql = "UPDATE matches SET status = 'scheduled', schedule_date = NOW() WHERE match_id = ?";
} elseif ($action === 'decline') {
    $sql = "UPDATE matches SET status = 'cancelled' WHERE match_id = ?";
} else {
    echo json_encode(['error' => 'Invalid action']);
    exit;
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $match_id);
if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['error' => 'Failed to update match status']);
}
?>
