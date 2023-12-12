<?php
include_once '../conn.php';
date_default_timezone_set("Asia/Karachi");

$sql2 = "SELECT * FROM licence WHERE is_license = 1 ORDER BY contractor_name ASC";
$sql_ret = "SELECT inventory_send.id, contractor_id , contractor_name , SUM(`explosive_quan`) as explosive_quan 
FROM `inventory_send`
JOIN `licence` ON `inventory_send`.`contractor_id` = `licence`.id
GROUP BY contractor_id;";

$c_name = $conn->query($sql2);
$ret_name = $conn->query($sql_ret);

$rows_ret = array();
while ($row_d = $ret_name->fetch_assoc()) {
    $rows_ret[] = $row_d;
}

$rows_send = array();
while ($row__d = $c_name->fetch_assoc()) {
    $rows_send[] = $row__d;
}

if (isset($_POST['add-btn'])) {
    $uploadDirectory = "./uploads/";
    $FilePath = NULL;
    if (!empty($_FILES['userfile']['name'])) {
        $tempFilePath = $_FILES['userfile']['tmp_name'];
        $file_name = $_FILES['userfile']['name'];
        $newFilePath = $uploadDirectory . $file_name;
        if (move_uploaded_file($tempFilePath, $newFilePath)) {
            $FilePath = $file_name;
        } else {
            echo "Error uploading file: $file_name<br>";
        }
    }
    $receivedLotNum = $_POST["receivedLotNum"];
    $weightOfLot = $_POST["weightOfLot"];
    $sql = "INSERT INTO inventory_add (received_lot, weight, attachment) VALUES ('$receivedLotNum','$weightOfLot','$FilePath')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Record inserted successfully!");</script>';
        header('Location: https://localhost/explosive/admin/');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if (isset($_POST['send-btn'])) {
    $uploadDirectory = "./uploads/";
    $FilePath = NULL;
    if (!empty($_FILES['userfile-send']['name'])) {
        $tempFilePath = $_FILES['userfile-send']['tmp_name'];
        $file_name = $_FILES['userfile-send']['name'];
        $newFilePath = $uploadDirectory . $file_name;
        if (move_uploaded_file($tempFilePath, $newFilePath)) {
            $FilePath = $file_name;
        } else {
            echo "Error uploading file: $file_name<br>";
        }
    }

    $contractor_id = $_POST["contractor_id"];
    $explosive_quan = $_POST["explosive_quan"];
    $location = $_POST["location"];

    $sql = "INSERT INTO inventory_send (contractor_id, explosive_quan, location, attachment) VALUES ('$contractor_id','$explosive_quan','$location','$FilePath')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Record inserted successfully!");</script>';
        header('Location: https://localhost/explosive/admin/');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if (isset($_POST['ret-btn'])) {
    $uploadDirectory = "./uploads/";
    $FilePath = NULL;

    if (!empty($_FILES['userfile-ret']['name'])) {
        $tempFilePath = $_FILES['userfile-ret']['tmp_name'];
        $file_name = $_FILES['userfile-ret']['name'];
        $newFilePath = $uploadDirectory . $file_name;
        if (move_uploaded_file($tempFilePath, $newFilePath)) {
            $FilePath = $file_name;
        } else {
            echo "Error uploading file: $file_name<br>";
        }
    }


    $contractor_id = $_POST["contractor_name_ret"];
    $inventory_id = $_POST["inventory_id"];
    $quan_ret = $_POST["quan_ret"];

    $sql = "INSERT INTO inventory_ret (contractor_id, quan_ret, inventory_id, attachment) VALUES ('$contractor_id','$quan_ret','$inventory_id','$FilePath')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Record inserted successfully!");</script>';
        header('Location: https://localhost/explosive/admin/');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
