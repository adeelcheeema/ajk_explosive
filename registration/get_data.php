<?php
include_once '../conn.php';

$depoId = $user_linked_id;

if (!is_numeric($depoId) || $depoId <= 0) {
    die("Invalid Link");
}

$sql2 = "SELECT * FROM depos WHERE id = $depoId";

$depo = $conn->query($sql2);

?>