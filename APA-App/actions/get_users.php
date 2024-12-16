<?php
include '../db/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = isset($_POST['search']) ? trim($_POST['search']) : '';
    $current_user_id = intval($_SESSION['user_id']);
    $role_id = 2; // Role ID for players

    $sql = "SELECT user_id, username FROM users WHERE role_id = ? AND user_id != ? AND username LIKE ? ORDER BY username ASC";
    $stmt = $conn->prepare($sql);
    $search_param = "%" . $search . "%";
    $stmt->bind_param('iis', $role_id, $current_user_id, $search_param);
    $stmt->execute();
    $result = $stmt->get_result();

    $users = [];
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }

    echo json_encode($users);
    exit;
}
