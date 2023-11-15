<!DOCTYPE html>
<html>

<head>
  <title>Inventory Management</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
        
   background-color: #0f0f0f;
   color:white;
    }

    .container {
        background-color : #5a1313;
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
  <div class="container">
    <h1 class="mb-4 text-center">Godown Inspector</h1>
    <form id="myForm" method="post">
      <div class="row">
        <div class="col-md-4" id="mill">
          <div class="form-group">
            <label for="godamName">Godown Name:</label>
            <select class="form-control form-control-lg" id="godamName" name="godamName">
              <?php


              if (mysqli_num_rows($godams)) {
                echo '<option value="">Select Godown</option>';
                while ($godam = $godams->fetch_assoc()) {
                  echo '<option value="' . $godam["id"] . '">' . $godam["name"] ."->". $godam["godam_name"] . '</option>';
                }
              } else {
                echo '<option value="">No Godown Found</option>';
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
        
        <div class="form-group col-md-3">
          <label for="receive">Receive (ton):</label>
          <input type="number" class="form-control form-control-lg" id="receive" name="receive">
        </div>
        
           <div class="form-group col-md-3">
          <label for="dispatch">Dispatch (ton):</label>
          <input type="number" class="form-control form-control-lg" id="dispatch" name="dispatch">
        </div>
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
      const godam = document.getElementById("godamName").value;
      const openingBalance = document.getElementById("openingBalance").value;
      const receive = document.getElementById("receive").value;
      const dispatch = document.getElementById("dispatch").value;
     
      if (godam === "") {
        alert("Please Choose Godam");
        event.preventDefault();
        return
      } else if (
        openingBalance === "" &&
        receive === "" &&
        dispatch === ""
      ) {
        alert("Please Enter Data");
        event.preventDefault(); 
        return
      }
     submitButton.style.display = "none";
    });
  </script>
</body>
</html>