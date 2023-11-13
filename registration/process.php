<?php
include_once '../conn.php';
date_default_timezone_set("Asia/Karachi");
if ($_POST) {
    $name = $_POST['name'];
    $license = $_POST['license'];
    $sql = "INSERT INTO licence (
        name,
        license
    ) VALUES (
        '$name',
        '$license'
    )";
    
    if ($conn->query($sql) === TRUE) {
         echo '<script>alert("Record inserted successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
