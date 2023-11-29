<?php
include_once '../../conn.php';
include_once '../../auth/header.php';
$id = $_GET['dd'] ?? null;
$sql2 = "SELECT * FROM licence WHERE id = $id";
$depo = $conn->query($sql2);
if ($_POST) {
    $comments = $_POST['comments'];
    $sql = "UPDATE licence SET comments = '$comments' WHERE id = $id";
    $conn->query($sql);
    header('Location: https://localhost/explosive/admin/dc/detail.php?dd='.$id);
    $conn->close();
}

?>