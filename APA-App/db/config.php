<?php
// $host = "localhost";
// $user = "root";
// $password = "";
// $dbname = "apa";

// $conn = mysqli_connect($host, $user, $password, $dbname);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
?>

<?php
// Define server details needed to connect to the database
$host = 'localhost'; 
$user = 'shammah.dzwairo';        
$password = 'theswink';          
$dbname = 'webtech_fall2024_shammah_dzwairo';      

// Attempt to connect to the database using the provided details
$conn = mysqli_connect($host, $user, $password, $dbname) 
    or die('Unable to connect'); 

// Check if the connection has an error and handle it
if ($conn->connect_error) {
    die('Connection failed'); 
}
?>
