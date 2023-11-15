<?php include('../auth/header.php'); ?>
<html>

<head>
  <title>Inventory Management</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

  <style>
  body{
      background-color:#0E0F2E;
  }
  .bg_head {
     background-color : #191D43;
}.logo {
    border-radius:20px;
}
  
   
  </style>
</head>


<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg_head">
        <div class="container-fluid">
            <a href="https://food.ajk.gov.pk/portal" class="navbar-brand">
                <img src="http://localhost/ajk_explosive/wp-content/uploads/2022/11/WhatsApp-Image-2022-12-02-at-2.21.30-PM-990x1024.jpeg" class="logo" height="80" alt="Food">
                <span class="text-sucess">Industries Department AJ&K</span>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-center " id="navbarCollapse">
                <div class="navbar-nav">
            
                  <a href="godam_dashboard.php" class="btn btn-primary mr-2" type="button">Godown Data</a>
                     <a href="mill_district_dashboard.php" class="btn btn-primary mr-2" type="button">Mill Data</a>
                     <a href="depo_district_dashboard.php" class="btn btn-primary mr-2" type="button">Depo Data</a>
             
                </div>
            </div>
            
             <form method="post">
        <input class="btn btn-danger mr-2" type="submit" name="logout" value="Logout">
    </form>
        </div>
    </nav>
  <div class="container-fluid p-5">

    <?php 
switch($user_role){
    case 'zone':
        include('zone/index.php');
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
    default:
        header('Location: http://localhost/ajk_explosive/');
        exit;
}
?>


</body>

</html>