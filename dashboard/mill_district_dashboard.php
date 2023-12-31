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
    .career-form {
      background-color: #328636 !important;
    }

    .career-form .form-control {
      background-color: rgba(255, 255, 255, 0.2);
      border: 0;
      padding: 10px;
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
      padding: 10px;
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
      padding: 10px;
    }

    ul {
      list-style: none;
    }

    .list-disk li {
      list-style: none;
      margin-bottom: 16px;
    }

    .list-disk li:last-child {
      margin-bottom: 0;
    }

    .job-box .top-holder {
      padding: 10px ;
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
      padding: 10px;
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
      padding: 10px;
      justify-content: center;
      background-color: #f3f3f3;
 color: black;
      font-family: "Open Sans", sans-serif;
      font-size: 16px;
      font-weight: 700;
      flex: 1;
      border-radius: 20px;
      align-items: baseline;
    }

 .holder-red{
         color: red !important;
    }
     .holder-stock{
         color: #328636 !important;
    }
    .holder-top {
      justify-content: center;
      background-color: #f3f3f3 !important;

    }

    .career-title {
      background-color: #4e63d7;
      color: #fff;
      padding: 10px;
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
      font-size: 16px;
      position: relative;
      top: 1px;
    }

    .job-overview .overview-bottom,
    .job-overview .overview-top {
      padding: 10px;
    }

    .job-content ul li {
      font-weight: 600;
      opacity: 0.75;
      border-bottom: 1px solid #ccc;
      padding: 10px;
    }

    @media (min-width: 768px) {
      .job-content ul li {
        border-bottom: 0;
        padding: 0;
      }
    }

    .job-content ul li i {
      font-size: 16px;
      position: relative;
      top: 1px;
    }

    .mb-30 {
      margin-bottom: 30px;
    }
     .text_quan {
    font-size: 16px;
    font-style: italic;
    margin-left:5px;
}  
  </style>
</head>

<?php
include('get_mills_district.php');
?>

<body>
  <div class="container-fluid p-5">



    <div class="row">



  <div class="col-sm-12 p-3">


    <div class="row">
        <div class="col-lg-12 mx-auto">
         <h1 class=" text-center h1 alert alert-success"> Mills Data District Wise</h1>
         </div>
      <div class="col-lg-12 mx-auto">



        <div class="filter-result ">

          <div class="job-box d-md-flex align-items-center justify-content-between career-form">

            <div class="top-holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
              District
            </div>
       
              <div class="top-holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
              Opening Balance
            </div>
            <div class="top-holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
              Received
            </div>
                 <div class="top-holder  mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
             Total
            </div>
            
            <div class="top-holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
              Dispatch
            </div>
            
             <div class="top-holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
              Bran
            </div>
            
            
             <div class="top-holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
              Closing Balance
            </div>
            
 <div class="top-holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
              Date


            </div>
            <!--<div class="top-holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">-->
            <!--  Total Sale-->


            <!--</div>-->

          </div>

        </div>


        <?php

        foreach ($districtSumsMill as $district => $sums) {
        ?>
 <a href="mill_listing_dashboard.php?dd=<?php echo $sums['id'] ?>" target="_blank">
          <div class="filter-result">

            <div class="job-box d-md-flex align-items-center justify-content-between mb-30">

              <div class="img-holder  mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
                <?php echo $district; ?>
              </div>
              
               <div class="holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
                <?php echo $sums['TotalOpeningBalance']  ?><span class="text_quan"> ton</span>
              </div>
              
               <div class="holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
                <?php echo $sums['TotalReceive'] ?><span class="text_quan"> ton</span>
              </div>
              
              <div class="holder holder-stock mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
                <?php 
                 $opening_balance = intval($sums["TotalOpeningBalance"]);
            $receive = intval($sums["TotalReceive"]);
            $total = $opening_balance + $receive ;
            echo $total;?><span class="text_quan"> ton</span>
              </div>
               
              <div class="holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
                <?php echo $sums['TotalDispatch'] ?><span class="text_quan"> ton</span>
              </div>
              <div class="holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
                <?php echo $sums['TotalTodaySale'] ?><span class="text_quan"> ton</span>
              </div>
              
               <div class="holder  holder-stock mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">
                <?php
                   $today_sale = intval($sums["TotalTodaySale"]);
            $dispatch = intval($sums["TotalDispatch"]);
            $closing = $total - $today_sale - $dispatch ;
            echo $closing; ?><span class="text_quan"> ton</span>
              </div>
              
                  <div class="holder mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex" >
                <?php echo date("d-m-Y",strtotime($sums['LatestCreatedAt'])) ?><span class="text_quan"></span>
              </div>
              <!--<div class="holder holder-red mr-md-2 mb-md-0 mb-4 mx-auto mx-md-0  d-lg-flex">-->
              <!--  <?php echo $sums['TotalTodaySale'] ?><span class="text_quan"> ton</span>-->



              <!--</div>-->

            </div>

          </div>
</a>
        <?php
        }

        ?>


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