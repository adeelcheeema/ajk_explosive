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
 .card_mill {
 
    background-color: #00c851;
  
}
 .card_depo {
 
   background-color: #144681;
  
}

.cat_heading {
    font-size: 40px;
    color: #144681;
        margin: 0px;
   
    font-weight: bold;
}

.cat_heading2{
     color: #00c851;
}

.text_heading {
    font-size: 20px;
    margin: 0px;
    color: white;
}
.text_count {
    font-size: 50px;
    color: white;
    margin: 0px;
   
    font-weight: bold;
}
 .text_quan {
    font-size: 16px;
    color: black;
    font-style: italic;
}  
   
  </style>
</head>

<?php
include('get_mills_district_id.php');
// include('get_inventory.php');


?>

<body>
  <div class="container-fluid p-5">


    <div class="row">

        <div class="col-lg-12 mx-auto" id="mill">
        <h1 class="mb-4 text-center">Mills Stock ( ton)</h1>
        <table class="table table-striped " id="datatable">
          <thead>
            <tr>
                 <th scope="col">#</th>
              <th scope="col">Mill Name</th>
              <th scope="col">Opening Balance</th>
              <th scope="col">Received Wheat</th>
              <th scope="col">Total</th>
              <th scope="col">Dispatch</th>
              <th scope="col">Bran</th>
              <th scope="col">Closing Balance</th>
                <th scope="col">Date</th>
            </tr>
          </thead>
          <tbody>


<?php
$serial = 1; // Initialize a counter variable
         while ($row_d = $mill_data->fetch_assoc())  { 

         ?>
                <tr>
                     <td> <?php echo $serial; ?></td>
                  <td> <?php echo $row_d["mill_name"]; ?></td>
                   
                  <td> <?php echo $row_d["opening_balance"]; ?><span class="text_quan"> ton</span></td>
                  <td> <?php echo $row_d["receive"]; ?><span class="text_quan"> ton</span></td>
                  
                   <td> <b><?php 
            
            $opening_balance = intval($row_d["opening_balance"]);
            $receive = intval($row_d["receive"]);
            $total = $opening_balance + $receive ;
            echo $total;
        ?></b><span class="text_quan"> ton</span></td>
                  
                    <td> <?php echo $row_d["dispatch"]; ?><span class="text_quan"> ton</span></td>
                  <td> <?php echo $row_d["today_sale"]; ?><span class="text_quan"> ton</span></td>
                   <td> <b>
                   <?php
            $today_sale = intval($row_d["today_sale"]);
            $dispatch = intval($row_d["dispatch"]);
            $closing = $total - $today_sale - $dispatch ;
            echo $closing;
                   
                   ?></b><span class="text_quan"> ton</span></td>
                  <td> <?php echo $row_d["created_at"]; ?><span class="text_quan"> ton</span></td>
                </tr>
            <?php 
                $serial++;
            } 
    


?>

          </tbody>
        </table>
      </div>


    
          </tbody>
        </table>
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
  </script>


</body>

</html>