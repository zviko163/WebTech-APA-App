

<?php
// Define server details needed to connect to the database
$host = 'localhost'; 
$user = 'root';        
$password = '';          
$dbname = 'apa';      

// Attempt to connect to the database using the provided details
$conn = mysqli_connect($host, $user, $password, $dbname) 
    or die('Unable to connect'); 

// Check if the connection has an error and handle it
if ($conn->connect_error) {
    die('Connection failed'); 
}
?>
