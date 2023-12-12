<?php
include_once '../../../conn.php';
include_once '../../../auth/header.php';

$sql_send = "SELECT inventory_cons.*, licence.*, SUM(`quan_ret`) as explosive_quan 
FROM `inventory_cons`
JOIN `licence` ON `inventory_cons`.`contractor_id` = `licence`.id
GROUP BY contractor_id;";

$s_name = $conn->query($sql_send);
?>