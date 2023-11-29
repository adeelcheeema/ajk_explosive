<?php
include_once '../../conn.php';
date_default_timezone_set("Asia/Karachi");
if ($_POST) {

    $uploadDirectory = "../uploads/";
  
    $uploadedFiles = [];
 
    foreach ($_FILES['userfile']['name'] as $key => $filename) {
        $tempFilePath = $_FILES['userfile']['tmp_name'][$key];
    
        $file_name = $filename;
        $newFilePath = $uploadDirectory . $file_name;
        
        if (move_uploaded_file($tempFilePath, $newFilePath)) {
            $uploadedFiles[] = $file_name;
        } else {
            echo "Error uploading file: $filename<br>";
        }
    }

    $attachmentsString =  implode(",",$uploadedFiles);
    
    $company_name = $_POST['company_name'];
    $contractor_name = $_POST['contractor_name'];
    $owner_cnic = $_POST['owner_cnic'];
    $contractor_cnic = $_POST['contractor_cnic'];
    $company_reg = $_POST['company_reg'];
    $project_name = $_POST['project_name'];
    $dept_name = $_POST['dept_name'];
    $quality_req = $_POST['quality_req'];
    $address_loc = $_POST['address_loc'];
    $project_loc = $_POST['project_loc'];
    $sql = "INSERT INTO licence (
        company_name , contractor_name, owner_cnic,
        contractor_cnic, company_reg, project_name,
        dept_name, quality_req, address_loc, project_loc,attachments
    ) VALUES (
        '$company_name',
        '$contractor_name', '$owner_cnic', 
        '$contractor_cnic', 
        '$company_reg','$project_name','$dept_name',
        '$quality_req','$address_loc','$project_loc','$attachmentsString'
    )";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Record inserted successfully!");</script>';
        header('Location: https://localhost/explosive/admin/');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
