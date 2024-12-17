<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "apa";

$conn = mysqli_connect($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<?php
// // Define server details needed to connect to the database
// $host = 'localhost'; // The server where the database is hosted
// $user = 'shammah.dzwairo';        // The user to access the database
// $password = 'theswink';            // The password to access the database (empty if none is set)
// $dbname = 'webtech_fall2024_shammah_dzwairo';      // The name of the database to connect to

// // Attempt to connect to the database using the provided details
// $conn = mysqli_connect($host, $user, $password, $dbname) 
//     or die('Unable to connect'); // If the connection fails, display an error message and stop execution

// // Check if the connection has an error and handle it
// if ($conn->connect_error) {
//     die('Connection failed'); // If there’s an error, stop execution and show 'Connection failed'
// } else {
//     // Connection was successful, so no further action is needed
// }
?>
