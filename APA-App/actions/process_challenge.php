<?php
include '../db/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['challenged_id']) && isset($_POST['schedule_date'])) {
    $challenger_id = intval($_SESSION['user_id']);
    $challenged_id = intval($_POST['challenged_id']);
    $schedule_date = $_POST['schedule_date'];

    // Server-side validation for schedule_date
    if (empty($schedule_date)) {
        echo json_encode(['status' => 'error', 'message' => 'Challenge date is required.']);
        exit;
    }
    if (strtotime($schedule_date) < strtotime(date('Y-m-d'))) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid schedule date. Please select a future date.']);
        exit;
    }

    try {
        // Insert the challenge into the database
        $sql = "INSERT INTO matches (challenger_id, challenged_id, status, schedule_date) VALUES (?, ?, 'pending', ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iis', $challenger_id, $challenged_id, $schedule_date);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Challenge sent successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to send challenge.']);
        }
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => 'An unexpected error occurred: ' . $e->getMessage()]);
    }
    exit;
}
?>
