<?php
$servername = "localhost";
$username = "industriesajkgov_explosive";
$password = "industriesajkgov_explosive";
$dbname = "industriesajkgov_explosive";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
