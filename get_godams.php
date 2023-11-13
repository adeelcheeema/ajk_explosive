<?php
include_once 'conn.php';
$sql = "SELECT * FROM godams ";
$godams = $conn->query($sql);
$conn->close();
?>