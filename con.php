<?php
// Database connection parameters (replace with your own credentials)
$servername = "localhost";
$username = "industriesajkgov_explosive";
$password = "industriesajkgov_explosive";
$dbname = "industriesajkgov_explosive";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
