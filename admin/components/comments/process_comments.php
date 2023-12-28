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
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    }
    ?>
    
