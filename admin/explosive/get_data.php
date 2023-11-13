<?php
include_once '../con.php';
$depoId = $user_linked_id;
if (!is_numeric($depoId) || $depoId <= 0) {
    die("Invalid Link");
}
$sql2 = "SELECT * FROM licence";
$depo = $conn->query($sql2);
?>