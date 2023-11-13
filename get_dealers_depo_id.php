<?php
include_once 'conn.php';

$depoId = $_GET['dp'] ?? null;

if (!is_numeric($depoId) || $depoId <= 0) {
    die("Invalid Link");
}
// $sql = "SELECT * FROM dealers WHERE depo_id	 = $depoId";
$sql2 = "SELECT * FROM depos WHERE id = $depoId";
// $dealers = $conn->query($sql);
$depo = $conn->query($sql2);
$conn->close();
?>