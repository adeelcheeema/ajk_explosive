<?php
include_once 'conn.php';

$districtId = $_GET['dd'] ?? null;


if (is_numeric($districtId) || $districtId > 0) {
    
  $sql = "SELECT  
districts.district_name AS District,
depo.district_id AS DistrictID,
depo.depo_name AS Depo,
t.opening_balance , 
t.receive ,
t.dispatch,
t.today_sale ,
subq.max_date AS LatestCreatedAt
FROM `inventory_depo` t
INNER JOIN `depos` depo ON t.depo_id = depo.id
INNER JOIN `districts` districts ON depo.district_id = districts.id
INNER JOIN (
    SELECT depo_id, MAX(date) AS max_date
    FROM `inventory_depo`
    GROUP BY depo_id
) subq ON t.depo_id = subq.depo_id AND t.date = subq.max_date
 WHERE district_id = $districtId";
    
    $sql_mill = "SELECT  
districts.district_name AS District,
mill.district_id AS DistrictID,
mill.mill_name AS Mill,
t.opening_balance AS TotalOpeningBalance, 
t.receive AS TotalReceive,
t.dispatch AS TotalDispatch,
t.today_sale AS TotalTodaySale,
subq.max_date AS LatestCreatedAt
FROM `inventory` t
INNER JOIN `mills` mill ON t.mill_id = mill.id
INNER JOIN `districts` districts ON mill.district_id = districts.id
INNER JOIN (
    SELECT mill_id, MAX(date) AS max_date
    FROM `inventory`
    GROUP BY mill_id
) subq ON t.mill_id = subq.mill_id AND t.date = subq.max_date
WHERE district_id = $districtId";
} else {
    
    
    
    $sql = "SELECT  
districts.district_name AS District,
depo.district_id AS DistrictID,
depo.depo_name AS Depo,
t.opening_balance , 
t.receive ,
t.dispatch,
t.today_sale ,
subq.max_date AS LatestCreatedAt
FROM `inventory_depo` t
INNER JOIN `depos` depo ON t.depo_id = depo.id
INNER JOIN `districts` districts ON depo.district_id = districts.id
INNER JOIN (
    SELECT depo_id, MAX(date) AS max_date
    FROM `inventory_depo`
    GROUP BY depo_id
) subq ON t.depo_id = subq.depo_id AND t.date = subq.max_date";
    
    $sql_mill = "SELECT  
districts.district_name AS District,
mill.district_id AS DistrictID,
mill.mill_name AS Mill,
t.opening_balance, 
t.receive,
t.dispatch,
t.today_sale,
subq.max_date AS LatestCreatedAt
FROM `inventory` t
INNER JOIN `mills` mill ON t.mill_id = mill.id
INNER JOIN `districts` districts ON mill.district_id = districts.id
INNER JOIN (
    SELECT mill_id, MAX(date) AS max_date
    FROM `inventory`
    GROUP BY mill_id
) subq ON t.mill_id = subq.mill_id AND t.date = subq.max_date;";

    
    $sql_godam = "SELECT  
godam.godam_name AS godam,
t.opening_balance, 
t.receive,
t.dispatch,
subq.max_date AS LatestCreatedAt
FROM `inventory_godam` t
INNER JOIN `godams` godam ON t.godam_id = godam.id
INNER JOIN (
    SELECT godam_id, MAX(date) AS max_date
    FROM `inventory_godam`
    GROUP BY godam_id
) subq ON t.godam_id = subq.godam_id AND t.date = subq.max_date;";
}


 
//   $sql = "SELECT t.*, depo.depo_name, districts.district_name
// FROM `inventory_depo` t
// INNER JOIN (
//     SELECT MAX(id) AS max_id
//     FROM `inventory_depo`
//     WHERE district_id = $districtId
//     GROUP BY depo_id
// ) subq ON t.id = subq.max_id
// INNER JOIN `depos` depo ON t.depo_id = depo.id
// INNER JOIN `districts` districts ON depo.district_id = districts.id";
    
//     $sql_mill = "SELECT t.*, mill.mill_name, districts.district_name
// FROM `inventory` t
// INNER JOIN (
//     SELECT MAX(id) AS max_id
//     FROM `inventory`
//     WHERE district_id = $districtId
//     GROUP BY mill_id
// ) subq ON t.id = subq.max_id
// INNER JOIN `mills` mill ON t.mill_id = mill.id
// INNER JOIN `districts` districts ON mill.district_id = districts.id";
// } else {
//     $sql = "SELECT t.*, depo.depo_name, districts.district_name
// FROM `inventory_depo` t
// INNER JOIN (
//     SELECT MAX(id) AS max_id
//     FROM `inventory_depo`
//     GROUP BY depo_id
// ) subq ON t.id = subq.max_id
// INNER JOIN `depos` depo ON t.depo_id = depo.id
// INNER JOIN `districts` districts ON depo.district_id = districts.id";
    
//     $sql_mill = "SELECT t.*, mill.mill_name, districts.district_name
// FROM `inventory` t
// INNER JOIN (
//     SELECT MAX(id) AS max_id
//     FROM `inventory`
//     GROUP BY mill_id
// ) subq ON t.id = subq.max_id
// INNER JOIN `mills` mill ON t.mill_id = mill.id
// INNER JOIN `districts` districts ON mill.district_id = districts.id";

    
//     $sql_godam = "SELECT t.*, godam.name
// FROM `inventory_godam` t
// INNER JOIN (
//     SELECT MAX(id) AS max_id
//     FROM `inventory_godam`
//     GROUP BY godam_id
// ) subq ON t.id = subq.max_id
// INNER JOIN `godams` godam ON t.godam_id = godam.id;";
// }



$depo_data = $conn->query($sql);
$mill_data = $conn->query($sql_mill);
$godam_data = $conn->query($sql_godam);

$depo_opening_balance = 0;
$depo_total_receive = 0;
$depo_total_dispatch = 0;
$depo_total_sale = 0;

$mill_opening_balance = 0;
$mill_total_receive = 0;
$mill_total_dispatch = 0;
$mill_total_sale = 0;

$godam_opening_balance = 0;
$godam_total_receive = 0;
$godam_total_dispatch = 0;

 while ($row = $depo_data->fetch_assoc()) {
        $depo_opening_balance += intval($row['opening_balance']);
        $depo_total_receive += intval($row['receive']);
        $depo_total_dispatch += intval($row['dispatch']);
        $depo_total_sale += intval($row['today_sale']);
    }
    
     while ($row = $mill_data->fetch_assoc()) {
        $mill_opening_balance += intval($row['opening_balance']);
        $mill_total_receive += intval($row['receive']);
        $mill_total_dispatch += intval($row['dispatch']);
        $mill_total_sale += intval($row['today_sale']);
    }

     while ($row = $godam_data->fetch_assoc()) {
        $godam_opening_balance += intval($row['opening_balance']);
        $godam_total_receive += intval($row['receive']);
        $godam_total_dispatch += intval($row['dispatch']);
    }
    
$godawn_total = $godam_opening_balance + $godam_total_receive - $godam_total_dispatch;
$depo_total = $depo_opening_balance + $depo_total_receive - $depo_total_dispatch - $depo_total_sale;
$mill_total = $mill_opening_balance + $mill_total_receive  - $mill_total_dispatch - $mill_total_sale;

$total_stock_wheat = $godawn_total + $mill_total;
$total_stock_floor = $depo_opening_balance + $depo_total_receive - $depo_total_dispatch - $depo_total_sale;
$total_stock = $total_stock_wheat + $total_stock_floor;

 $conn->close();
?>