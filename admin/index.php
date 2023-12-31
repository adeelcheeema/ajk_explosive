<?php include('../auth/header.php'); ?>
<html>

<head>
  <title>Inventory Management</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

  <style>
  body{
      background-color:#0f0f0f;
  }
  .bg_head {
     background-color : #5a1313;
}.logo {
    border-radius:20px;
}
  
   
  </style>
</head>


<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg_head">
        <div class="container-fluid">
            <a href="https://localhost/explosive" class="navbar-brand">
                <img src="https://localhost/explosive/admin/images/logo.jpeg" class="logo" height="80" alt="Explosive">
                <span class="text-sucess">Industries Department AJ&K</span>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
      
             <form method="post">
        <input class="btn btn-danger mr-2" type="submit" name="logout" value="Logout">
    </form>
        </div>
    </nav>
  <div class="container-fluid p-5">

    <?php 
switch($user_role){
    case 'dc':
        include('dc/index.php');
        break; 
    case 'godown':
        include('godown/index.php');
        break;
    case 'home':
        include('home/index.php');
        break;
    case 'explosive':
        include('explosive/index.php');
        break;
    case 'magazine':
        include('magazine/index.php');
        break;
    case 'inspector':
            include('inspector/index.php');
            break;
    default:
        header('Location: https://localhost/explosive/');
        exit;
}
?>


</body>

</html>