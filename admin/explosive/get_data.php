<?php
include_once '../conn.php';
include_once '../auth/header.php';
$sql2 = "SELECT * FROM licence where is_noc = 1 ";
$depo = $conn->query($sql2);
?>