<?php
include_once '../conn.php';
date_default_timezone_set("Asia/Karachi");
if ($_POST) {
    
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
        dept_name, quality_req, address_loc, project_loc
    ) VALUES (
        '$company_name',
        '$contractor_name', '$owner_cnic', 
        '$contractor_cnic', 
        '$company_reg','$project_name','$dept_name',
        '$quality_req','$address_loc','$project_loc' 
    )";
    
    if ($conn->query($sql) === TRUE) {
         echo '<script>alert("Record inserted successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
