<?php
include_once 'con.php';

$districtId = $_GET['dd'] ?? null;

if (!is_numeric($districtId) || $districtId <= 0) {
    die("Invalid Link");
}
$sql = "SELECT * FROM mills WHERE district_id = $districtId";
$sql2 = "SELECT * FROM depos WHERE district_id = $districtId";
$sql3 = "SELECT * FROM districts WHERE id = $districtId";
$mills = $conn->query($sql);
$depos = $conn->query($sql2);
$district = $conn->query($sql3);
$conn->close();
?>