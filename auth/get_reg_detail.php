<?php
include_once '../conn.php';
$sql = "SELECT * FROM godams";
$sql1 = "SELECT * FROM mills";
$sql2 = "SELECT * FROM depos";

$godams = $conn->query($sql);
$mills = $conn->query($sql1);
$depos = $conn->query($sql2);
$conn->close();
?>