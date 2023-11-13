<?php
include_once '../conn.php';

$districtId = $_GET['dd'] ?? null;

if (is_numeric($districtId) || $districtId > 0) {
    
  
//     $sql_mill = "SELECT
//     mill.mill_name AS mill_name,
//     MAX(CASE WHEN DATE(t.date) = subq.max_date THEN t.receive ELSE 0 END) AS receive,
//     MAX(CASE WHEN DATE(t.date) = subq.max_date THEN t.opening_balance ELSE 0 END) AS opening_balance,
//  	MAX(CASE WHEN DATE(t.date) = subq.max_date THEN t.dispatch ELSE 0 END) AS dispatch,
//  	MAX(CASE WHEN DATE(t.date) = subq.max_date THEN t.today_sale ELSE 0 END) AS today_sale,
//     subq.max_date AS created_at
// FROM `inventory` t
// INNER JOIN `mills` mill ON t.mill_id = mill.id
// INNER JOIN `districts` districts ON mill.district_id = districts.id
// INNER JOIN (
//     SELECT mill_id, MAX(DATE(date)) AS max_date
//     FROM `inventory`
//     GROUP BY mill_id
// ) subq ON t.mill_id = subq.mill_id
// WHERE mill.district_id = $districtId
// GROUP BY districts.district_name, mill.mill_name, subq.max_date";


  
    $sql_mill = "SELECT  
districts.district_name AS District,
mill.district_id AS DistrictID,
mill.mill_name,
t.opening_balance , 
t.receive ,
t.dispatch ,
t.today_sale ,
subq.max_date AS created_at
FROM `inventory` t
INNER JOIN `mills` mill ON t.mill_id = mill.id
INNER JOIN `districts` districts ON mill.district_id = districts.id
INNER JOIN (
    SELECT mill_id, MAX(date) AS max_date
    FROM `inventory`
    GROUP BY mill_id
) subq ON t.mill_id = subq.mill_id AND t.date = subq.max_date
WHERE mill.district_id = $districtId";

} else {
   
    $sql_mill = "SELECT  
districts.district_name AS District,
mill.district_id AS DistrictID,
mill.mill_name,
t.opening_balance , 
t.receive ,
t.dispatch ,
t.today_sale ,
subq.max_date AS created_at
FROM `inventory` t
INNER JOIN `mills` mill ON t.mill_id = mill.id
INNER JOIN `districts` districts ON mill.district_id = districts.id
INNER JOIN (
    SELECT mill_id, MAX(date) AS max_date
    FROM `inventory`
    GROUP BY mill_id
) subq ON t.mill_id = subq.mill_id AND t.date = subq.max_date";
}


$mill_data = $conn->query($sql_mill);



 $conn->close();
?>