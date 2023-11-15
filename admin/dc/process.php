<?php
include_once '../conn.php';
date_default_timezone_set("Asia/Karachi");
if ($_POST) {

    $depoId = $_POST['depoID'];
    $openingBalance = $_POST['openingBalance'];
    $receive = $_POST['receive'];
    $dispatch = $_POST['dispatch'];
    $todaySale = $_POST['todaySale'];
    
    $bags = $_POST['bags'];
    $weight = $_POST['weight'];
    $amount = $_POST['amount'];
    
    $date = date('Y-m-d H:i:s');
    if (isset($_POST['date']) && $_POST['date'] !== "") {
        $date = date('Y-m-d H:i:s',strtotime($_POST['date'].' '.date('H:i:s')));
    };
    
    
    $sql = "INSERT INTO inventory_depo (
        depo_id,
        opening_balance, receive,
        dispatch,today_sale,date,bags,weight,amount
    ) VALUES (
        '$depoId',
        '$openingBalance', '$receive', 
        '$dispatch', '$todaySale','$date',
        '$bags','$weight','$amount'
    )";
    
    if ($conn->query($sql) === TRUE) {
         echo '<script>alert("Record inserted successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
