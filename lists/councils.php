<!DOCTYPE html>
<html>

<head>
  <title>Inventory Management</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

  <style>
      a:hover{
           text-decoration:none;
       }
    .bg {
       padding: 20px;
    justify-content: center;
    background:  #1749ae ;
    font-family: "Open Sans", sans-serif;
    color: #fff;
    font-size: 16px;
    font-weight: 700;
    flex: 1;
    border-radius: 20px;
    }
.bg:hover{
     background: #5a85dd ;
}
    
   
  </style>
</head>

<?php
include_once '../con.php';

$districtId = $_GET['dd'] ?? null;

if (!is_numeric($districtId) || $districtId <= 0) {
    die("Invalid Link");
}
$sql = "SELECT * FROM depos WHERE district_id = $districtId";
$councils = $conn->query($sql);
$conn->close();
?>



<body>
  <div class="container-fluid p-5">



    <div class="row">



  <div class="col-sm-12 p-3">



    <div class="row">
         <div class="col-lg-10 mx-auto">
         <h1 class=" text-center h1 alert alert-primary">Depo Data District Wise</h1>
         </div>
      <div class="col-lg-10 mx-auto">


 <div class="row filter-result">
<?php

         while ($row_d = $councils->fetch_assoc())  { ?>
              

       

              <div class="col-sm-2 p-2">
                    <a href="https://foodsurvey.ajk.gov.pk/public/portal/set_villages.php?depo=<?php echo $row_d["id"]; ?>" target="_blank">
                   <div class="bg">
                <?php echo $row_d["depo_name"]; ?>
              </div>
              </a>
             </div>
           

       
            <?php  
          
            } 
    
 

?>
 </div>

       

      </div>

    </div>

  </div>

  </div>

  <!-- Include Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>


  <script>
    new DataTable('#datatable');
    new DataTable('#datatableMill');
  </script>


</body>

</html>