<?php
include_once '../con.php';

$districtId = $_GET['dd'] ?? null;

if (is_numeric($districtId) || $districtId > 0) {
    
//   $sql = "SELECT t.*, depo.depo_name, districts.district_name
// FROM `inventory` t
// INNER JOIN (
//     SELECT MAX(id) AS max_id
//     FROM `inventory`
//     WHERE district_id = $districtId
//     GROUP BY depo_id
// ) subq ON t.id = subq.max_id
// INNER JOIN `depos` depo ON t.depo_id = depo.id
// INNER JOIN `districts` districts ON depo.district_id = districts.id";
    
// } else {
//     $sql = "SELECT t.*, depo.depo_name, districts.district_name
// FROM `inventory` t
// INNER JOIN (
//     SELECT MAX(id) AS max_id
//     FROM `inventory`
//     GROUP BY depo_id
// ) subq ON t.id = subq.max_id
// INNER JOIN `depos` depo ON t.depo_id = depo.id
// INNER JOIN `districts` districts ON depo.district_id = districts.id";
// }


   
//   $sql = "SELECT
//     districts.district_name AS district_name,
//     depo.depo_name AS depo_name,
//     SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.receive ELSE 0 END) AS receive,
//     SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.opening_balance ELSE 0 END) AS opening_balance,
//     SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.dispatch ELSE 0 END) AS dispatch,
//     SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.today_sale ELSE 0 END) AS today_sale,
//     subq.max_date AS date
// FROM `inventory_depo` t
// INNER JOIN `depos` depo ON t.depo_id = depo.id
// INNER JOIN `districts` districts ON depo.district_id = districts.id
// INNER JOIN (
//     SELECT depo_id, MAX(DATE(date)) AS max_date
//     FROM `inventory_depo`
//     GROUP BY depo_id
// ) subq ON t.depo_id = subq.depo_id
// WHERE depo.district_id = $districtId
// GROUP BY districts.district_name, depo.depo_name, subq.max_date;";

  $sql = "SELECT  
districts.district_name,
depo.district_id AS DistrictID,
depo.depo_name,
t.opening_balance,
t.receive ,
t.dispatch ,
t.today_sale ,
subq.max_date AS date
FROM `inventory_depo` t
INNER JOIN `depos` depo ON t.depo_id = depo.id
INNER JOIN `districts` districts ON depo.district_id = districts.id
INNER JOIN (
    SELECT depo_id, MAX(date) AS max_date
    FROM `inventory_depo`
    GROUP BY depo_id
) subq ON t.depo_id = subq.depo_id AND t.date = subq.max_date
 WHERE depo.district_id = $districtId";
    
} else {
    $sql = "SELECT  
districts.district_name AS District,
depo.district_id AS DistrictID,
depo.depo_name AS Depo,
t.opening_balance,
t.receive ,
t.dispatch ,
t.today_sale ,
subq.max_date AS date
FROM `inventory_depo` t
INNER JOIN `depos` depo ON t.depo_id = depo.id
INNER JOIN `districts` districts ON depo.district_id = districts.id
INNER JOIN (
    SELECT depo_id, MAX(date) AS max_date
    FROM `inventory_depo`
    GROUP BY depo_id
) subq ON t.depo_id = subq.depo_id AND t.date = subq.max_date";
}


$depo_data = $conn->query($sql);
$depos = [];
$conn->close();
?>