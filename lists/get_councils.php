<?php
include_once 'conn.php';

// $sql = "SELECT
//     districts.district_name AS District,
//     GROUP_CONCAT(depo.district_id) AS DistrictID,
//     depo.depo_name AS DepoName,
//     SUM(t.opening_balance) AS TotalOpeningBalance, 
//     SUM(t.receive) AS TotalReceive,
//     SUM(t.dispatch) AS TotalDispatch,    
//     SUM(t.today_sale) AS TotalTodaySale,
//     MAX(t.created_at) AS LatestCreatedAt
// FROM (
//     SELECT
//         id,
//         depo_id,
//         opening_balance,
//         receive,
//         dispatch,
//         today_sale,
//         created_at
//     FROM `inventory`
//     UNION ALL
//     SELECT
//         id,
//         depo_id,
//         opening_balance,
//         receive,
//         dispatch,
//         today_sale,
//         created_at
//     FROM `inventory_depo`
// ) t
// INNER JOIN (
//     SELECT MAX(id) AS max_id
//     FROM (
//         SELECT id, depo_id FROM `inventory`
//         UNION ALL
//         SELECT id, depo_id FROM `inventory_depo`
//     ) combined
//     GROUP BY depo_id
// ) subq ON t.id = subq.max_id
// INNER JOIN `depos` depo ON t.depo_id = depo.id
// INNER JOIN `districts` districts ON depo.district_id = districts.id
// GROUP BY districts.district_name, t.depo_id, depo.depo_name
// ORDER BY LatestCreatedAt DESC;";

  $sql = "SELECT
    districts.district_name AS District,
    GROUP_CONCAT(t.district_id) AS DistrictID,
    depo.depo_name AS DepoName,
    SUM(t.opening_balance) AS TotalOpeningBalance, 
    SUM(t.receive) AS TotalReceive,
    SUM(t.dispatch) AS TotalDispatch,    
    SUM(t.today_sale) AS TotalTodaySale,
    MAX(t.created_at) AS LatestCreatedAt
FROM `inventory` t
INNER JOIN (
    SELECT MAX(id) AS max_id
    FROM `inventory`
    GROUP BY depo_id
) subq ON t.id = subq.max_id
INNER JOIN `depos` depo ON t.depo_id = depo.id
INNER JOIN `districts` districts ON depo.district_id = districts.id
GROUP BY districts.district_name, t.depo_id, depo.depo_name
ORDER BY LatestCreatedAt DESc";
    
    
    
//   $sql = "SELECT
//     districts.district_name AS District,
//     GROUP_CONCAT(depo.district_id) AS DistrictID,
//     depo.depo_name AS DepoName,
//     SUM(t.opening_balance) AS TotalOpeningBalance, 
//     SUM(t.receive) AS TotalReceive,
//     SUM(t.dispatch) AS TotalDispatch,    
//     SUM(t.today_sale) AS TotalTodaySale,
//     MAX(t.created_at) AS LatestCreatedAt
// FROM `inventory_depo` t
// INNER JOIN (
//     SELECT MAX(id) AS max_id
//     FROM `inventory_depo`
//     GROUP BY depo_id
// ) subq ON t.id = subq.max_id
// INNER JOIN `depos` depo ON t.depo_id = depo.id
// INNER JOIN `districts` districts ON depo.district_id = districts.id
// GROUP BY districts.district_name, t.depo_id, depo.depo_name
// ORDER BY districts.district_name";
    

$depo_data = $conn->query($sql);

$districtSums = [];


foreach ($depo_data as $row) {
    $district = $row['District'];
    $districtId = $row['DistrictID'];
    $LatestCreatedAt = $row['LatestCreatedAt'];
    if (!isset($districtSums[$district])) {
        $districtSums[$district] = [
            'TotalOpeningBalance' => 0,
            'TotalReceive' => 0,
            'TotalDispatch' => 0,
            'TotalTodaySale' => 0,
            'id' => 0,
        ];
    }
    $districtSums[$district]['TotalOpeningBalance'] += $row['TotalOpeningBalance'];
    $districtSums[$district]['TotalReceive'] += $row['TotalReceive'];
    $districtSums[$district]['TotalDispatch'] += $row['TotalDispatch'];
    $districtSums[$district]['TotalTodaySale'] += $row['TotalTodaySale'];
    $districtSums[$district]['id'] = $districtId;
    $districtSums[$district]['LatestCreatedAt'] = $LatestCreatedAt;
}



 $conn->close();
?>