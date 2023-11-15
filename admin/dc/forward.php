<?php
include_once '../../conn.php';
date_default_timezone_set("Asia/Karachi");

$ID = $_GET['dd'] ?? null;

if ($ID) {
    
    $sql = "UPDATE licence SET is_dc = 1 WHERE id = $ID;";
    
    if ($conn->query($sql) === TRUE) {
         echo '<script>alert("Moved To Dc successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    header('Location: https://industries.ajk.gov.pk/dc/admin/');

    $conn->close();
}
?>
