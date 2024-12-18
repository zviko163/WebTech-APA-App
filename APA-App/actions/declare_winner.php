<?php
include '../db/config.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Decode input data
$data = json_decode(file_get_contents("php://input"), true);

// Check input validity
if (isset($data['match_id'], $data['winner_id'])) {
    $match_id = $data['match_id'];
    $winner_id = $data['winner_id'];

    // Start transaction for consistency
    $conn->begin_transaction();

    try {
        // Validate that winner exists in the users table
        $check_winner = $conn->prepare("SELECT user_id FROM users WHERE user_id = ?");
        $check_winner->bind_param("i", $winner_id);
        $check_winner->execute();
        $check_winner->store_result();

        if ($check_winner->num_rows == 0) {
            echo json_encode(['success' => false, 'error' => 'Winner does not exist.']);
            $check_winner->close();
            exit;
        }
        $check_winner->close();

        // Fetch the match details to get challenger_id and challenged_id
        $get_match = $conn->prepare("SELECT challenger_id, challenged_id FROM matches WHERE match_id = ?");
        $get_match->bind_param("i", $match_id);
        $get_match->execute();
        $result = $get_match->get_result();

        if ($result->num_rows == 0) {
            echo json_encode(['success' => false, 'error' => 'Match does not exist.']);
            $get_match->close();
            exit;
        }

        $match = $result->fetch_assoc();
        $challenger_id = $match['challenger_id'];
        $challenged_id = $match['challenged_id'];
        $get_match->close();

        // Determine loser
        $loser_id = ($winner_id == $challenger_id) ? $challenged_id : $challenger_id;

        // Update match status and winner
        $update_match = $conn->prepare("UPDATE matches SET winner = ?, status = 'completed' WHERE match_id = ?");
        $update_match->bind_param("ii", $winner_id, $match_id);
        $update_match->execute();
        $update_match->close();

        // Increment matches_played for both winner and loser
        $increment_matches = $conn->prepare("
            UPDATE profiles 
            SET matches_played = matches_played + 1 
            WHERE user_id IN (?, ?)
        ");
        $increment_matches->bind_param("ii", $winner_id, $loser_id);
        $increment_matches->execute();
        $increment_matches->close();

        // Increment wins for the winner
        $increment_wins = $conn->prepare("
            UPDATE profiles 
            SET won = won + 1 
            WHERE user_id = ?
        ");
        $increment_wins->bind_param("i", $winner_id);
        $increment_wins->execute();
        $increment_wins->close();

        // Increment losses for the loser
        $increment_losses = $conn->prepare("
            UPDATE profiles 
            SET lost = lost + 1 
            WHERE user_id = ?
        ");
        $increment_losses->bind_param("i", $loser_id);
        $increment_losses->execute();
        $increment_losses->close();

        // Commit transaction
        $conn->commit();

        echo json_encode(['success' => true, 'message' => 'Match updated successfully.']);
    } catch (Exception $e) {
        // Rollback transaction in case of error
        $conn->rollback();
        echo json_encode(['success' => false, 'error' => 'Database error: ' . $e->getMessage()]);
    }

} else {
    echo json_encode(['success' => false, 'error' => 'Invalid input data.']);
}

$conn->close();
?>
