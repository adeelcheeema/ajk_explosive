<?php
include_once '../../../conn.php';
include_once '../../../auth/header.php';

$sql_send = "SELECT inventory_send.*, licence.*, SUM(`explosive_quan`) as explosive_quan 
FROM `inventory_send`
JOIN `licence` ON `inventory_send`.`contractor_id` = `licence`.id
GROUP BY contractor_id;";

$s_name = $conn->query($sql_send);
?>