<?php
require '../../vendor/autoload.php';

use Cloudinary\Configuration\Configuration;

// Configure Cloudinary
Configuration::instance([
    'cloud' => [
        'cloud_name' => 'di7hz7dve', // Replace with your Cloudinary cloud name
        'api_key' => '296368461161161',       // Replace with your Cloudinary API key
        'api_secret' => 'vc7CHtk1aW0rAJ4AhMXmbZPNc6A', // Replace with your Cloudinary API secret
    ],
]);

echo "Cloudinary configured successfully!";

?>