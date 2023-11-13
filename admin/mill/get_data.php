<?php
include_once '../con.php';

$districtId = $user_linked_id;

if (!is_numeric($districtId) || $districtId <= 0) {
    die("Invalid Link");
}
$sql = "SELECT * FROM mills WHERE district_id = $districtId";
$sql3 = "SELECT * FROM districts WHERE id = $districtId";

// var_dump($sql);
// var_dump($sql3);
// exit;
$mills = $conn->query($sql);
$district = $conn->query($sql3);

?>