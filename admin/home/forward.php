<?php
include_once '../../conn.php';
date_default_timezone_set("Asia/Karachi");

$accept_id = $_GET['aa'] ?? null;
$reject_id = $_GET['rr'] ?? null;

if ($accept_id) {
    $sql = "UPDATE licence SET is_noc = 1 WHERE id = $accept_id;";
    if ($conn->query($sql) === TRUE) {
         echo '<script>alert("NOC issued and Moved to Explosive Department successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else if($reject_id){
    $sql = "UPDATE licence SET is_noc = 2 WHERE id = $reject_id;";
    if ($conn->query($sql) === TRUE) {
         echo '<script>alert("NOC Rejected");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
   
}

header('Location: https://industries.ajk.gov.pk/explosive/admin/');
$conn->close();
?>
