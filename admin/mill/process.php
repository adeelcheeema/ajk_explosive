<?php
include_once '../con.php';
date_default_timezone_set("Asia/Karachi");
if ($_POST) {
    
    $d_ID = $_POST['distrctID'];
    $millId = $_POST['millName'];
    $openingBalance = $_POST['openingBalance'];
    $receive = $_POST['receive'];
    $dispatch = $_POST['dispatch'];
    $todaySale = $_POST['todaySale'];

    $date = date('Y-m-d H:i:s');
    if (isset($_POST['date']) && $_POST['date'] != "") {
        $date = date('Y-m-d H:i:s',strtotime($_POST['date'].' '.date('H:i:s')));
    };
    
    $sql = "INSERT INTO inventory (
        mill_id,
        opening_balance, receive, 
        dispatch,today_sale,district_id,date
    ) VALUES (
        '$millId',
        '$openingBalance', '$receive', 
        '$dispatch', 
        '$todaySale','$d_ID','$date'
    )";
    
    if ($conn->query($sql) === TRUE) {
         echo '<script>alert("Record inserted successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
