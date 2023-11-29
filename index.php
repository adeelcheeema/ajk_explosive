<?php include('auth/header.php');

$total_stock = 20;
$total_stock_wheat = 30;
$total_stock_floor = 15;
$mill_total = 10;
$depo_total = 5
?>
<html>

<head>
  <title>Explosive Management</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

  <style>
  body{
      background-color:#000433;
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
     background-color : #5a1313;
}
.logo {
    border-radius:20px;
}
   
  </style>
</head>



<body>
     <nav class="navbar navbar-expand-lg navbar-dark bg_head">
        <div class="container-fluid">
            <a href="https://localhost" class="navbar-brand">
                <img src="https://localhost/explosive/admin/images/logo.jpeg" class="logo" height="80" alt="Food">
                <span class="text-sucess">Industries Department AJ&K</span>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-center " id="navbarCollapse">
                <!-- <div class="navbar-nav">
            
                  <a href="dashboard/godam_dashboard.php" class="btn btn-primary mr-2" type="button">Godowns Data</a>
                     <a href="dashboard/mill_district_dashboard.php" class="btn btn-primary mr-2" type="button">Mills Data</a>
                     <a href="dashboard/depo_district_dashboard.php" class="btn btn-primary mr-2" type="button">Depots Data</a>
             
                </div> -->
            </div>
            <?php 
            include_once('admin/admin_button.php');
            ?>
        </div>
    </nav>


  <div class="container-fluid p-5">

 <div class="row">
    
               <div class="col-md-3 p-2">
        
         <div
id="myChart" style="width:100%; max-width:600px; height:400px;">
</div>
      </div>
       <div class="col-md-9 p-2">
         <div class="row">
                        <div class="col-md-12 p-2">
                             <h1 class="text-white">Executive Summary (Explosive) AJK</h1>
        </div>

        <div class="col-md-6 p-2 ">
          <div class="card bg-success card_big">
            <p class="text_heading  text-white">Explosive Stock</p>
            <p class="text_count  text-white"><?php echo $total_stock_wheat ?><span class="text_quan"> ton</span></p>
          </div>
      </div>
       <div class="col-md-6 p-2 ">
          <div class="card bg-danger card_big">
            <p class="text_heading  text-white">Magazine Stock</p>
            <p class="text_count  text-white"><?php echo $total_stock_floor ?><span class="text_quan"> ton</span></p>
          </div>
      </div>
        
       <div class="col-md-3 p-2 ">
           <a href="https://localhost/explosive/admin/" target="_blank">
          <div class="card  bg-main">
            <p class="text_heading  text-white">License Issued</p>
            <p class="text_count  text-white"><?php echo $mill_total ?></p>
          </div>
          </a>
      </div>

          
      <div class="col-md-3 p-2 ">
           <a href="https://localhost/explosive/admin/" target="_blank">
          <div class="card  bg-main">
            <p class="text_heading  text-white">License Rejected</p>
            <p class="text_count  text-white"><?php echo $mill_total ?></p>
          </div>
          </a>
      </div>
      
       
       <div class="col-md-3 p-2 ">
            <a href="https://localhost/explosive/admin/" target="_blank">
          <div class="card  bg-main">
            <p class="text_heading  text-white">NOC Issued</p>
            <p class="text_count  text-white"><?php echo $depo_total ?></p>
          </div>
          </a>
      </div>
      
    
      <div class="col-md-3 p-2 ">
            <a href="https://localhost/explosive/admin/" target="_blank">
          <div class="card  bg-main">
            <p class="text_heading  text-white">NOC Rejected</p>
            <p class="text_count  text-white"><?php echo $depo_total ?></p>
          </div>
          </a>
      </div>
      
      
       
      
       
      
      
        </div>
        </div>
       
         
            </div>
            
     
 </div>
  
  </div>

 <script src="https://www.gstatic.com/charts/loader.js"></script>
  <!-- Include Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    
 
    const total = "<?php echo $total_stock; ?>";
    const total_wheat = "<?php echo $total_stock_wheat; ?>";
    const total_floor = "<?php echo $total_stock_floor; ?>";
    // Set Data
    const data = google.visualization.arrayToDataTable([
      ['Stock', 'tons'],
      ['Explosive',Number(total_wheat)],
      ['Magazine',Number(total_floor)],
    ]);

        var options = {
     
          legend: {
      position: 'top',
      maxLines: 4,
      
      textStyle: {fontSize: 14, color: '#FFF'}},
    backgroundColor: 'transparent',
    is3D: true,
    width: 400,
    height:300,
         
          // title: 'Total Employees',
          
       
          slices: {
        0: { color: '#56CB74' },
        1: { color: '#EE2A38' },
      },
        };

   

    // Draw
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);

}
</script>

</body>


</html>