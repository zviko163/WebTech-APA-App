<?php
session_start();
session_destroy();

// Disable caching to prevent "back" button from loading cached pages
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

echo json_encode(['success' => 'Logged out successfully.']);
?>
