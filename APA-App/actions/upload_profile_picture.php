<?php
include '../db/config.php';
require '../../vendor/autoload.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

session_start();
if (!isset($_SESSION['user_id'])) {
    echo json_encode(["success" => "You are not logged in."]);
    exit;
}
$user_id = $_SESSION['user_id'];

// Configure Cloudinary credentials
Configuration::instance([
    'cloud' => [
        'cloud_name' => 'di7hz7dve', 
        'api_key' => '296368461161161', 
        'api_secret' => 'vc7CHtk1aW0rAJ4AhMXmbZPNc6A',
    ],
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['profile_picture']['tmp_name'];
        $fileName = $_FILES['profile_picture']['name'];
        $fileSize = $_FILES['profile_picture']['size'];
        $fileType = $_FILES['profile_picture']['type'];

        // Validate file type (only images)
        if (!in_array($fileType, ['image/jpeg', 'image/png', 'image/gif'])) {
            echo json_encode(['success' => false, 'error' => 'Invalid file type. Only JPG, PNG, and GIF are allowed.']);
            exit();
        }

        try {
            // Upload to Cloudinary
            $upload = (new UploadApi())->upload($fileTmpPath, [
                'folder' => 'APA-WebApp/profiles',      // Upload to the "profiles" folder
                'public_id' => 'user_' . $user_id,      // Set the public ID to "user_{user_id}"
                'overwrite' => true,                    // Overwrite the existing image
            ]);

            // Get the Cloudinary image URL
            $imageUrl = $upload['secure_url'];
            echo "<script>console.log('Debug Objects: " . $imageUrl . "' );</script>";

            // Update the user's profile picture URL in the database
            $sql = 'UPDATE profiles SET picture = ? WHERE user_id = ?';
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si', $imageUrl, $user_id);  // Bind the Cloudinary URL
            $stmt->execute();
            $stmt->close();

            // Return the uploaded image URL
            echo json_encode(['success' => true, 'url' => $imageUrl]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'No valid file uploaded.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
