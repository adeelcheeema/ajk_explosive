<?php
include_once 'conn.php';

$districtId = $_GET['dd'] ?? null;

if (is_numeric($districtId) || $districtId > 0) {
    $sql = "SELECT * FROM `inventory` t INNER JOIN `depos` d ON t.depo_id = d.id INNER JOIN `districts` dt ON t.district_id = dt.id WHERE t.district_id = $districtId";
    
     $sql_mill = "SELECT * FROM `inventory` t INNER JOIN `mills` d ON t.mill_id = d.id INNER JOIN `districts` dt ON t.district_id = dt.id WHERE t.district_id = $districtId";
} else {
    $sql = "SELECT * FROM `inventory` t INNER JOIN `depos` d ON t.depo_id = d.id INNER JOIN `districts` dt ON t.district_id = dt.id";
    
    $sql_mill = "SELECT * FROM `inventory` t INNER JOIN `mills` d ON t.mill_id = d.id INNER JOIN `districts` dt ON t.district_id = dt.id";
}

$depo_data = $conn->query($sql);
$mill_data = $conn->query($sql_mill);

$conn->close();
?>