<?php
include_once '../con.php';
//   $sql = "SELECT t.godam_id, godam.godam_name,
//       SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.receive ELSE 0 END) AS receive,
//     SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.opening_balance ELSE 0 END) AS opening_balance,
//  	SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.receive ELSE 0 END) AS receive,
//  	SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.dispatch ELSE 0 END) AS dispatch,
//     subq.max_date AS created_at
// FROM `inventory_godam` t
// INNER JOIN (
//     SELECT godam_id, MAX(DATE(date)) AS max_date
//     FROM `inventory_godam`
//     GROUP BY godam_id
// ) subq ON t.godam_id = subq.godam_id
// INNER JOIN `godams` godam ON t.godam_id = godam.id
// GROUP BY t.godam_id, godam.godam_name, subq.max_date;";
    
    $sql = "SELECT  
godam.godam_name,
t.opening_balance, 
t.receive,
t.dispatch,
subq.max_date AS created_at
FROM `inventory_godam` t
INNER JOIN `godams` godam ON t.godam_id = godam.id
INNER JOIN (
    SELECT godam_id, MAX(date) AS max_date
    FROM `inventory_godam`
    GROUP BY godam_id
) subq ON t.godam_id = subq.godam_id AND t.date = subq.max_date;";
    
$godam_data = $conn->query($sql);

 $conn->close();
?>