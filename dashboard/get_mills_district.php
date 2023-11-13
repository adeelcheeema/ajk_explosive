<?php
include_once '../conn.php';


//     $sql_mill = "SELECT
//     districts.district_name AS District,
//     GROUP_CONCAT(DISTINCT mill.district_id) AS DistrictID,
//     mill.mill_name AS Mill,
//     SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.receive ELSE 0 END) AS TotalReceive,
//     SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.opening_balance ELSE 0 END) AS TotalOpeningBalance,
//  	SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.dispatch ELSE 0 END) AS TotalDispatch,
//  	SUM(CASE WHEN DATE(t.date) = subq.max_date THEN t.today_sale ELSE 0 END) AS TotalTodaySale,
//     subq.max_date AS LatestCreatedAt
// FROM `inventory` t
// INNER JOIN `mills` mill ON t.mill_id = mill.id
// INNER JOIN `districts` districts ON mill.district_id = districts.id
// INNER JOIN (
//     SELECT mill_id, MAX(DATE(date)) AS max_date
//     FROM `inventory`
//     GROUP BY mill_id
// ) subq ON t.mill_id = subq.mill_id
// GROUP BY districts.district_name, mill.mill_name, subq.max_date";


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
ORDER BY mill.id";

$mill_data = $conn->query($sql_mill);


$districtSumsMill = [];


foreach ($mill_data as $row) {
    $district = $row['District'];
    $districtId = $row['DistrictID'];
    $LatestCreatedAt = $row['LatestCreatedAt'];
    if (!isset($districtSumsMill[$district])) {
        $districtSumsMill[$district] = [
            'TotalOpeningBalance' => 0,
            'TotalReceive' => 0,
            'TotalDispatch' => 0,
            'TotalTodaySale' => 0,
            'id' => 0,
        ];
    }
    $districtSumsMill[$district]['TotalOpeningBalance'] += (int)$row['TotalOpeningBalance'];
    $districtSumsMill[$district]['TotalReceive'] += (int)$row['TotalReceive'];
    $districtSumsMill[$district]['TotalDispatch'] += (int)$row['TotalDispatch'];
    $districtSumsMill[$district]['TotalTodaySale'] +=(int) $row['TotalTodaySale'];
    $districtSumsMill[$district]['id'] = $districtId;
    $districtSumsMill[$district]['LatestCreatedAt'] = $LatestCreatedAt;
}


 $conn->close();
?>