<?php
// Include DB connection
include '../db/config.php';

// SQL query to fetch all roles
$query = "SELECT * FROM roles"; 
$result = $conn->query($query);

$roles = [];
while ($row = $result->fetch_assoc()) {
    $roles[] = $row;
}

echo json_encode($roles);  
?>
