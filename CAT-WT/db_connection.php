<?php
// Database credentials
$servername = "localhost"; // Change this if your database server is on a different host
$username = "Hiti"; // Change this to your database username
$password = "Hiti1234"; // Change this to your database password
$dbname = "smart_health_management_system"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
