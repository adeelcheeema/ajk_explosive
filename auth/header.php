<?php session_start();
$portal_user_id = null;
if(!isset($_SESSION['portal_user_id'])) {
        header('Location: https://localhost/explosive/auth/login.php');
        exit();
}
$portal_user_id = $_SESSION['portal_user_id'];
$user_name = $_SESSION['name'];
$user_linked_id = $_SESSION['linked_id'];
$user_role_id = $_SESSION['user_role'];

$role = ['super-admin','admin','zone','dc','home','explosive'];
$user_role = $role[$_SESSION['user_role']-1];
    if (isset($_POST['logout'])) {
        session_destroy(); 
        header('Location: https://localhost/explosive/');  
        exit();
}
?>

