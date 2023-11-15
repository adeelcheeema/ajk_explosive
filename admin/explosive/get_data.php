<?php
include_once '../conn.php';
include_once '../auth/header.php';
$depoId = $user_linked_id;
if (!is_numeric($depoId) || $depoId <= 0) {
    die("Invalid Link");
}
$sql2 = "SELECT * FROM licence where is_noc = 1 ";
$depo = $conn->query($sql2);
?>