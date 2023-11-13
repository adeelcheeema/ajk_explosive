<?php

include_once '../conn.php';
date_default_timezone_set("Asia/Karachi");
if ($_POST) {

    $godamId = $_POST['godamName'];
    $openingBalance = $_POST['openingBalance'];
    $receive = $_POST['receive'];
    $dispatch = $_POST['dispatch'];
    
    $date = date('Y-m-d H:i:s');
    if (isset($_POST['date']) && $_POST['date'] !== "") {
        $date = date('Y-m-d H:i:s',strtotime($_POST['date'].' '.date('H:i:s')));
    };

    $sql = "INSERT INTO inventory_godam (
        godam_id,
        opening_balance, receive, 
        dispatch,date
    ) VALUES (
        '$godamId',
        '$openingBalance', '$receive', 
        '$dispatch', '$date'
    )";

    if ($conn->query($sql) === TRUE) {
         echo '<script>alert("Record inserted successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
