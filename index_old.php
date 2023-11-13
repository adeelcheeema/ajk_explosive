<!DOCTYPE html>
<html>

<head>
  <title>Inventory Management</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-image: url('https://images.unsplash.com/photo-1543257580-7269da773bf5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8d2hlYXR8ZW58MHx8MHx8fDA%3D&w=1000&q=80');
      /* Set your image path here */
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center;
    }

    .container {
      background-color: #fefefeee;
      /* Add a semi-transparent white background to the form container */
      padding: 20px;
      border-radius: 10px;
    }

    #depo {
      display: none;
    }



    /* Additional styles can be added here */
  </style>
</head>

<?php
include('get_mills.php');
?>

<body>
  <div class="container mt-5 mb-5">
    <h1 class="mb-4 text-center">Inventory Management</h1>
    <h1 class="mb-4 text-center">DFC

      (<?php
        if (mysqli_num_rows($district)) {
          $district_name = $district->fetch_assoc();
          echo $district_name["district_name"];
        } ?>)
    </h1>
    <form id="myForm" method="post" action="process.php">
      <!--<div class="row p-3">-->

      <!--  <div class="form-check pr-3">-->
      <!--    <input class="form-check-input" type="radio" name="radioGroup" value="show" id="millRadio" checked>-->
      <!--    <label class="form-check-label" for="defaultCheck1">-->
      <!--      Mill-->
      <!--    </label>-->
      <!--  </div>-->
      <!--  <div class="form-check">-->
      <!--    <input class="form-check-input" type="radio" name="radioGroup" value="hide" id="depoRadio">-->
      <!--    <label class="form-check-label" for="defaultCheck2">-->
      <!--      Depo-->
      <!--    </label>-->
      <!--  </div>-->
      <!--</div>-->
      <div class="row">

        <div class="col-md-4" id="mill">

          <div class="form-group">
            <label for="millName">Mill Name:</label>
            <select class="form-control form-control-lg" id="millName" name="millName">
              <?php

              if (mysqli_num_rows($mills)) {
                echo '<option value="">Select Mill</option>';
                while ($mill = $mills->fetch_assoc()) {
                  echo '<option value="' . $mill["id"] . '">' . $mill["mill_name"] . '</option>';
                }
              } else {
                echo '<option value="">No Mill Found</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <!--<div class="col-md-4" id="depo">-->
        <!--  <div class="form-group">-->
        <!--    <label for="millName">Depo Name:</label>-->
        <!--    <select class="form-control form-control-lg" id="depoName" name="depoName">-->
              <?php

            //   if (mysqli_num_rows($depos)) {
            //     echo '<option value="">Select Depo</option>';
            //     while ($depo = $depos->fetch_assoc()) {

            //       echo '<option value="' . $depo["id"] . '">' . $depo['depo_name'] . '</option>';
            //     }
            //   } else {
            //     echo '<option value="">No Mill Found</option>';
            //   }
              ?>
        <!--    </select>-->
        <!--  </div>-->


        <!--</div>-->
      </div>
      <div class="row">
        <h2 class="mb-4 text-center form-group col-md-12">Balance</h2>


        <div class="form-group col-md-4">

          <label for="openingBalance">Opening Balance (ton):</label>
          <input type="number" class="form-control form-control-lg" id="openingBalance" name="openingBalance">
        </div>
        <div class="form-group col-md-4 ">
          <label for="closingBalance">Closing Balance (ton):</label>
          <input type="number" class="form-control form-control-lg" id="closingBalance" name="closingBalance">
        </div>
        <div class="col-md-4 ">

        </div>
         <h2 class="mb-4 text-center form-group col-md-12">Receive</h2>
        <div class="form-group col-md-4">
          <label for="receive">Today Receive (ton):</label>
          <input type="number" class="form-control form-control-lg" id="receive" name="receive">
        </div>
        <div class="form-group col-md-4">
          <label for="todayTotalReceive">Total Receive (ton):</label>
          <input type="number" class="form-control form-control-lg" id="todayTotalReceive" name="todayTotalReceive">
        </div>
        <div class="form-group col-md-4">
          <label for="totalMonthlyReceive">Total Monthly Receive (ton):</label>
          <input type="number" class="form-control form-control-lg" id="totalMonthlyReceive" name="totalMonthlyReceive">
        </div>


      </div>

      <div class="row">

        <h2 class="mb-4 text-center col-md-12">Dispatch</h2>
        <div class="form-group col-md-4">

          <label for="dispatch">Today Dispatch (ton):</label>
          <input type="number" class="form-control form-control-lg" id="dispatch" name="dispatch">
        </div>
        <div class="form-group col-md-4">
          <label for="todayTotalDispatch">Total Dispatch (ton):</label>
          <input type="number" class="form-control form-control-lg" id="todayTotalDispatch" name="todayTotalDispatch">
        </div>
        <div class="form-group col-md-4">
          <label for="monthlyTotalDispatch">Total Monthly Dispatch (ton):</label>
          <input type="number" class="form-control form-control-lg" id="monthlyTotalDispatch" name="monthlyTotalDispatch">
        </div>
      </div>
      <div class="row">

        <h2 class="mb-4 text-center col-md-12">Sale</h2>
        <div class="form-group col-md-4">
          <label for="sale">Today Sale (ton):</label>
          <input type="number" class="form-control form-control-lg" id="todaySale" name="todaySale">
        </div>

        <div class="form-group col-md-4">
          <label for="totalSale">Total Sale (ton):</label>
          <input type="number" class="form-control form-control-lg" id="totalSale" name="totalSale">
        </div>
        <input type="hidden" id='distrctID' style="display:none" name="distrctID" value=<?php echo ($districtId) ?>>

      </div>

      <div class="row">
        <div class="col text-center">
          <button type="submit" class="btn btn-primary btn-lg text-center">Submit</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Include Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    var showRadio = document.getElementById('millRadio');
    var hideRadio = document.getElementById('depoRadio');
    var mill = document.getElementById('mill');
    var depo = document.getElementById('depo');
    var millSelect = document.getElementById('millName');
    var depoSelect = document.getElementById('depoName');
    showRadio.addEventListener('change', function() {
      if (showRadio.checked) {
        mill.style.display = 'block';
        depo.style.display = 'none';
        depoSelect.value = "";
      }
    });
    hideRadio.addEventListener('change', function() {
      if (hideRadio.checked) {
        depo.style.display = 'block';
        mill.style.display = 'none';
        millSelect.value = "";
      }
    });
  </script>
  <script>
    document.getElementById("myForm").addEventListener("submit", function(event) {
     const mill = document.getElementById("millName").value;
    // const depo = document.getElementById("depoName").value;
      const openingBalance = document.getElementById("openingBalance").value;
      const closingBalance = document.getElementById("closingBalance").value;
      const receive = document.getElementById("receive").value;
      const todayTotalReceive = document.getElementById("todayTotalReceive").value;
      const totalMonthlyReceive = document.getElementById("totalMonthlyReceive").value;
      const dispatch = document.getElementById("dispatch").value;
      const todayTotalDispatch = document.getElementById("todayTotalDispatch").value;
      const monthlyTotalDispatch = document.getElementById("monthlyTotalDispatch").value;
      const todaySale = document.getElementById("todaySale").value;
      const totalSale = document.getElementById("totalSale").value;


      debugger;

      if (mill === "") {
        alert("Please Select Mill");
        event.preventDefault();
      } else if (
        openingBalance === "" &&
        closingBalance === "" &&
        receive === "" &&
        todayTotalReceive === "" &&
        totalMonthlyReceive === "" &&
        dispatch === "" &&
        todayTotalDispatch === "" &&
        monthlyTotalDispatch === "" &&
        todaySale === "" &&
        totalSale === ""
      ) {
        alert("Please Enter data");
        event.preventDefault(); // Prevent the form from submitting
      }

    });
  </script>
</body>
</html>