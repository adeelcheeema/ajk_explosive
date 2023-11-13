<?php
include_once 'con.php';
$sql = "SELECT * FROM godams ";
$godams = $conn->query($sql);
$conn->close();
?>