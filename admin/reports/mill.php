<!DOCTYPE html>
<html>

<head>
  <title>Flour Mill Stock Position</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">

  <style>
    a:hover {
      text-decoration: none;
    }

    .career-form {
      background-color: #328636 !important;
    }

    .career-form .form-control {
      background-color: rgba(255, 255, 255, 0.2);
      border: 0;
      padding: 12px 15px;
      color: #fff;
    }

    .career-form .form-control::-webkit-input-placeholder {
      /* Chrome/Opera/Safari */
      color: #fff;
    }

    .career-form .form-control::-moz-placeholder {
      /* Firefox 19+ */
      color: #fff;
    }

    .career-form .form-control:-ms-input-placeholder {
      /* IE 10+ */
      color: #fff;
    }

    .career-form .form-control:-moz-placeholder {
      /* Firefox 18- */
      color: #fff;
    }

    .career-form .custom-select {
      background-color: rgba(255, 255, 255, 0.2);
      border: 0;
      padding: 12px 15px;
      color: #fff;
      width: 100%;
      border-radius: 5px;
      text-align: left;
      height: auto;
      background-image: none;
    }


    .career-form .select-container {
      position: relative;
    }



    .filter-result .job-box {
      background: #fff;
      -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
      box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
      border-radius: 10px;
      padding: 10px 35px;
    }

    ul {
      list-style: none;
    }

    .list-disk li {
      list-style: none;
      margin-bottom: 12px;
    }

    .list-disk li:last-child {
      margin-bottom: 0;
    }

    .job-box .top-holder {
      padding: 10px 20px;
      background-color: #38943b;
      font-family: "Open Sans", sans-serif;
      color: #fff;
      font-size: 16px;
      font-weight: 700;
      justify-content: center;
      flex: 1;
      border-radius: 20px;
    }

    .job-box .img-holder {
      padding: 20px;
      justify-content: center;
      background-color: #38943b;
      background-image: linear-gradient(to right, #328636 0%, #4CAF50 100%);
      font-family: "Open Sans", sans-serif;
      color: #fff;
      font-size: 16px;
      font-weight: 700;
      flex: 1;
      border-radius: 20px;
    }

    .job-box .holder {
      padding: 20px;
      justify-content: center;
      background-color: #f3f3f3;
      color: black;
      font-family: "Open Sans", sans-serif;
      font-size: 22px;
      font-weight: 700;
      flex: 1;
      border-radius: 20px;
      align-items: baseline;
    }

    .holder-red {
      color: red !important;
    }

    .holder-stock {
      color: #328636 !important;
    }

    .holder-top {
      justify-content: center;
      background-color: #f3f3f3 !important;

    }

    .career-title {
      background-color: #4e63d7;
      color: #fff;
      padding: 15px;
      text-align: center;
      border-radius: 10px 10px 0 0;
      background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
      background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%);
    }

    .job-overview {
      -webkit-box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
      box-shadow: 0 0 35px 0 rgba(130, 130, 130, 0.2);
      border-radius: 10px;
    }

    @media (min-width: 992px) {
      .job-overview {
        position: -webkit-sticky;
        position: sticky;
        top: 70px;
      }
    }

    .job-overview .job-detail ul {
      margin-bottom: 28px;
    }

    .job-overview .job-detail ul li {
      opacity: 0.75;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .job-overview .job-detail ul li i {
      font-size: 20px;
      position: relative;
      top: 1px;
    }

    .job-overview .overview-bottom,
    .job-overview .overview-top {
      padding: 35px;
    }

    .job-content ul li {
      font-weight: 600;
      opacity: 0.75;
      border-bottom: 1px solid #ccc;
      padding: 10px 5px;
    }

    @media (min-width: 768px) {
      .job-content ul li {
        border-bottom: 0;
        padding: 0;
      }
    }

    .job-content ul li i {
      font-size: 20px;
      position: relative;
      top: 1px;
    }

    .mb-30 {
      margin-bottom: 30px;
    }

    .text_quan {
      font-size: 16px;
      font-style: italic;
      margin-left: 5px;
    }
  </style>
</head>

<?php
include('get_mill_data.php');
?>

<body>
  <div class="container-fluid p-5">



    <div class="row">



      <div class="col-sm-12 p-3">


        <div class="row">

          <div class="col-lg-12 mx-auto">
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
                   
                  <td> <?php echo $row_d["opening_balance"]; ?></td>
                  <td> <?php echo $row_d["receive"]; ?></td>
                  
                   <td> <b><?php 
            
            $opening_balance = intval($row_d["opening_balance"]);
            $receive = intval($row_d["receive"]);
            $total = $opening_balance + $receive ;
            echo $total;
        ?></b></td>
                  
                    <td> <?php echo $row_d["dispatch"]; ?></td>
                  <td> <?php echo $row_d["today_sale"]; ?></td>
                   <td> <b>
                   <?php
            $today_sale = intval($row_d["today_sale"]);
            $dispatch = intval($row_d["dispatch"]);
            $closing = $total - $today_sale - $dispatch ;
            echo $closing;
                   
                   ?></b></td>
                </tr>
            <?php 
                $serial++;
            } 
    


?>

          </tbody>
        </table>



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



<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

  <script>
  
  $(document).ready(function() {
    $('#datatable').DataTable( {
        dom: 'Bfrtip',
        buttons:  [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );

  </script>



</body>

</html>