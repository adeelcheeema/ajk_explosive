<?php
include_once '../../conn.php';
include_once '../../auth/header.php';
$l_ID = $_GET['dd'] ?? null;
$sql2 = "SELECT * FROM comments Where lic_id = $l_ID";
$comments = $conn->query($sql2);
?>