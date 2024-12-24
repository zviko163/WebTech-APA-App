<?php
include '../db/config.php';
require '../../vendor/autoload.php'; // Ensure Cloudinary PHP SDK is installed via Composer

use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

// Configure Cloudinary credentials
Configuration::instance([
    'cloud' => [
        'cloud_name' => 'di7hz7dve', 
        'api_key' => '296368461161161',       
        'api_secret' => 'vc7CHtk1aW0rAJ4AhMXmbZPNc6A', 
    ],
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['event_picture']) && $_FILES['event_picture']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['event_picture']['tmp_name'];

        try {
            // Upload to Cloudinary
            $upload = (new UploadApi())->upload($fileTmpPath, [
                'folder' => 'APA-WebApp/events', // Upload to the "events" folder
            ]);

            // Return the uploaded image URL
            echo json_encode(['success' => true, 'url' => $upload['secure_url']]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'No valid file uploaded.']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
}
