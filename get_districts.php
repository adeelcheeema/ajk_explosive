<?php
include_once 'conn.php';
$sql = "SELECT * FROM districts";
$result = $conn->query($sql);
$districts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $districts[] = $row['district_name'];
    }
}
$conn->close();
?>