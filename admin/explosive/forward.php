<?php include_once '../../conn.php';
date_default_timezone_set("Asia/Karachi");
$accept_id = $_GET['aa'] ?? null;
$reject_id = $_GET['rr'] ?? null;
$ID = $_GET['dd'] ?? null;

if ($accept_id) {
    $sql = "UPDATE licence SET is_license = 1 WHERE id = $accept_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if ($reject_id) {
    $sql = "UPDATE licence SET is_license = 2 WHERE id = $reject_id";
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else if ($ID) {
    $sql = "UPDATE licence SET is_home = 1 WHERE id = $ID;";
    if ($conn->query($sql) === TRUE) {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
