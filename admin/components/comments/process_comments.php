<?php
include_once '../../../conn.php';
date_default_timezone_set("Asia/Karachi");
if ($_POST) {
    session_start();
    $l_ID = $_GET['l_id'] ?? null;
    if ($l_ID) {
        $comments = $_POST['comments'];
        $office_name = $_SESSION['user_role'];
        $sql = "INSERT INTO comments (
            lic_id,
            comments,
            office_name 
        ) VALUES (
            '$l_ID',
            '$comments', 
            '$office_name'
        )";

        if ($conn->query($sql) === TRUE) {
            if($office_name == '4') {
            $sql = "UPDATE licence SET comments = 1 WHERE id = $l_ID";
            $conn->query($sql); }
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    }
    ?>
    
