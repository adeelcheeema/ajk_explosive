<?php
include_once '../conn.php';
include_once '../auth/header.php';
// $sql2 = "SELECT * FROM licence Where is_dc = 1 ORDER BY created_at Desc";
$sql2 = "SELECT * FROM licence ORDER BY created_at Desc";
$depo = $conn->query($sql2);
?>