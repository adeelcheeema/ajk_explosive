


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
    color: white;
    font-style: italic;
}  
   
  </style>
</head>

<?php

include_once '../conn.php';
$sql = "SELECT mills.mill_name, districts.district_name
FROM mills
INNER JOIN districts ON mills.district_id = districts.id
WHERE mills.id NOT IN (12, 9999);";
$godams = $conn->query($sql);
$conn->close();
?>



<body>
  <div class="container-fluid p-5">


    <div class="row">

        <div class="col-lg-10 mx-auto" id="mill">
        <h1 class="mb-4 text-center">Mills List</h1>
        <table class="table table-striped" id="datatable">
          <thead>
            <tr>
                 <th scope="col">#</th>
              <th scope="col">Mill Name</th>
            <th scope="col">District</th>
            </tr>
          </thead>
          <tbody>

<?php
$count = 1;

         while ($row_d = $godams->fetch_assoc())  { ?>
                <tr>
                  <td> <?php echo $count; ?></td>
                  <td> <?php echo $row_d["mill_name"]; ?></td>
                     <td> <?php echo $row_d["district_name"]; ?></td>
                </tr>
            <?php  
             $count ++;
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