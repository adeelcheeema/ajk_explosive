<?php
include_once 'conn.php';
function getTotal($conn, $table, $column)
{
    $sql = "SELECT SUM($column) AS total FROM $table";
    $result = $conn->query($sql);
    $total = 0;
    if ($result && $row = $result->fetch_assoc()) {
        $total = intval($row['total']);
    }
    return $total;
}

$add_total = getTotal($conn, 'inventory_add', 'weight');
$approved_total = getTotal($conn, 'licence', 'quality_req');
$send_total = getTotal($conn, 'inventory_send', 'explosive_quan');
$ret_total = getTotal($conn, 'inventory_ret', 'quan_ret');
$cons_total = getTotal($conn, 'inventory_cons', 'quan_ret');

$conn->close();
?>