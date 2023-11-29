<?php
include_once '../conn.php';
include_once '../auth/header.php';
$sql2 = "SELECT * FROM licence ORDER BY created_at Desc";
$depo = $conn->query($sql2);
?>