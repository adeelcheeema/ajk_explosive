<?php include('auth/header.php'); ?>
<html>

<head>
  <title>Explosive Management</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

  <style>
  body{
      background-color:#0E0F2E;
  }
   a:hover{
       text-decoration:none;
   }
   .card {
    height: 140px;
    background-size: contain;
    margin: 0px;
    padding: 0px;
    display: flex;
    justify-content: center;
    padding-left: 20px;
    flex-direction: column;
    background-repeat: no-repeat;
    border-radius: 10px;
    background-position: right;
}

.card_big{
      height: 140px;
}

.bg-main{
    background-color:#144681;
}

.bg-main2{
    background-color:#58508d;
}

.bg-main3{
    background-color:#ff6361;
}

    
/* .card_godam {*/
/*   background-color: #ff9800;*/
/*}*/


/* .card_mill {*/
/*    background-color: #00c851;*/
/*}*/

/* .card_depo {*/
/*   background-color: #144681;*/
/*}*/


.text_heading {
    font-size: 20px;
    margin: 0px;
}
.text_count {
    font-size: 44px;
    margin: 0px;
    font-weight: bold;
}
 .text_quan {
    font-size: 16px;
    font-style: italic;
} 
.bg_head {
     background-color : #191D43;
}
.logo {
    border-radius:20px;
}
   
  </style>
</head>



<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg_head">
        <div class="container-fluid">
            <a href="https://industries.ajk.gov.pk" class="navbar-brand">
                <img src="http://localhost/ajk_explosive/wp-content/uploads/2022/11/WhatsApp-Image-2022-12-02-at-2.21.30-PM-990x1024.jpeg" class="logo" height="80" alt="Food">
                <span class="text-sucess">Industries Department AJ&K</span>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-center " id="navbarCollapse">
                <div class="navbar-nav">
            
                  <a href="dashboard/godam_dashboard.php" class="btn btn-primary mr-2" type="button">Godowns Data</a>
                     <a href="dashboard/mill_district_dashboard.php" class="btn btn-primary mr-2" type="button">Mills Data</a>
                     <a href="dashboard/depo_district_dashboard.php" class="btn btn-primary mr-2" type="button">Depots Data</a>
             
                </div>
            </div>
            <?php 
            include_once('admin/admin_button.php');
            ?>
        </div>
    </nav>
  <div class="container-fluid p-5">
    <?php 
    include_once('./admin/index.php')
    ?>
  </div>

 <script src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- Include Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>



</body>

</html>