<?php
include_once '../conn.php';
include_once '../auth/header.php';
$sql2 = "SELECT * FROM licence Where is_dc = 1";
$depo = $conn->query($sql2);
?>