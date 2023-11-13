<!DOCTYPE html>
<html>

<head>
  <title>Inventory Management</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>


    body {
       
   background-color: #0E0F2E;
   color:white;
    }

    .container {
        background-color : #191D43;
      /* Add a semi-transparent white background to the form container */
      padding: 20px;
      border-radius: 10px;
    }

   .form-control {
        background-color: #515277;
    border: 2px solid #22245d;
    color:white;
    }


    /* Additional styles can be added here */
  </style>
</head>

<?php
include('get_data.php');
include('process.php');
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
    <form id="myForm" method="post">
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
     <div class="col-md-4 offset-md-4" id="mill">

          <div class="form-group">
            <label for="millName">Date :</label>
            <input type="date" class="form-control form-control-lg" id="date" name="date">
          </div>
        </div>  
      </div>
      <div class="row">
        <h2 class="mb-4 text-center form-group col-md-12"> </h2>


        <div class="form-group col-md-3">
          <label for="openingBalance">Opening Balance (ton):</label>
          <input type="number" class="form-control form-control-lg" id="openingBalance" name="openingBalance">
        </div>
        <div class="form-group col-md-3 ">
          <label for="receive">Receive Wheat (ton):</label>
          <input type="number" class="form-control form-control-lg" id="receive" name="receive">
        </div>
        
        
        <div class="form-group col-md-3">
          <label for="dispatch">Dispatch (ton):</label>
          <input type="number" class="form-control form-control-lg" id="dispatch" name="dispatch">
        </div>
        <div class="form-group col-md-3">
          <label for="todaySale">Bran (ton):</label>
          <input type="number" class="form-control form-control-lg" id="todaySale" name="todaySale">
        </div>
        <input type="hidden" id='distrctID' style="display:none" name="distrctID" value=<?php echo ($districtId) ?>>
      </div>

      

      <div class="row">
        <div class="col text-center">
          <button id="submitBtn" type="submit" class="btn btn-primary btn-lg text-center">Submit</button>
        </div>
      </div>
    </form>
  </div>

  <!-- Include Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
  <script>
    document.getElementById("myForm").addEventListener("submit", function(event) {
      const submitButton = document.getElementById("submitBtn");
      const mill = document.getElementById("millName").value;
      const openingBalance = document.getElementById("openingBalance").value;
      const receive = document.getElementById("receive").value;
      const dispatch = document.getElementById("dispatch").value;
      const todaySale = document.getElementById("todaySale").value;
      if (mill === "") {
        alert("Please Select Mill");
        event.preventDefault();
        return
      } else if (
        openingBalance === "" &&
        receive === "" &&
        dispatch === "" &&
        todaySale === "" 
      ) {
        alert("Please Enter data");
        event.preventDefault(); // Prevent the form from submitting
        return
      }
        submitButton.style.display = "none";
    });
  </script>
</body>
</html>