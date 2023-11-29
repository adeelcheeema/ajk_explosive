<?php session_start();
include_once '../conn.php';

if(isset($_SESSION['portal_user_id'])) {
     header('Location: https://localhost/explosive/');
     exit();
}

if (isset($_POST['signin'])) {
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $query = "SELECT * FROM users WHERE username = ? AND password = ? LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (!$result) {
        die('Query Failed: ' . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        session_start();
        $_SESSION['portal_user_id'] = $row['user_id'];
        $_SESSION['name'] = $row['username'];
        $_SESSION['user_role'] = $row['role_id'];
        $_SESSION['linked_id'] = $row['linked_id'];
        header('Location: https://localhost/explosive/');
        exit();
    } else {
        echo '<script>alert("Login Failed!");</script>';
    }
    mysqli_stmt_close($stmt);
}


?>