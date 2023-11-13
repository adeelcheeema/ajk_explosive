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
include('process.php');
?>

<body>
  <div class="container mt-5 mb-5">
    <h1 class="mb-4 text-center">Explosive Registration</h1>
    <form id="myForm" method="post" >
                  
      <div class="row">
              <h2 class="mb-4 text-center form-group col-md-12"> </h2>
              <div class="form-group col-md-3">
                <label for="name">Name:</label>
                <input class="form-control form-control-lg" id="name" name="name">
              </div>
              
               <div class="form-group col-md-3">
                  <label for="license">License Type</label>
                  <input class="form-control form-control-lg" id="license" name="license">
                </div>
              
            
                   <div class="row pt-4">
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


  <!--<script>-->
  <!--  document.getElementById("myForm").addEventListener("submit", function(event) {-->
  <!--    const submitButton = document.getElementById("submitBtn");-->
  <!--    const openingBalance = document.getElementById("openingBalance").value;-->
  <!--    const receive = document.getElementById("receive").value;-->
  <!--    const dispatch = document.getElementById("dispatch").value;-->
  <!--    const todaySale = document.getElementById("todaySale").value;-->
    
  <!--      const bags = document.getElementById("bags").value;-->
  <!--      const weight = document.getElementById("weight").value;-->
  <!--      const amount = document.getElementById("amount").value;-->

  <!--    if (openingBalance === "" && receive === "" && dispatch === "" && todaySale === "") {-->
  <!--      alert("Please Enter Data");-->
  <!--      event.preventDefault();-->
  <!--      return-->
  <!--  } else if (todaySale !== "" && (bags === "" || weight === "" || amount === "")) {-->
  <!--       alert("Please Enter Sale Details");-->
  <!--      event.preventDefault();-->
  <!--      return-->
  <!--  }-->
  <!--  submitButton.style.display = "none";-->

  <!--  });-->
  <!--</script>-->
  
  <!--  <script>-->
  <!--  function toggleFields() {-->
  <!--    const todaySaleInput = document.getElementById("todaySale");-->
  <!--    const bagsDiv = document.getElementById("bagsDiv");-->
  <!--    const weightDiv = document.getElementById("weightDiv");-->
  <!--    const amountDiv = document.getElementById("amountDiv");-->

  <!--    if (todaySaleInput.value) {-->
  <!--      bagsDiv.style.display = "block";-->
  <!--      weightDiv.style.display = "block";-->
  <!--      amountDiv.style.display = "block";-->
  <!--    } else {-->
  <!--      bagsDiv.style.display = "none";-->
  <!--      weightDiv.style.display = "none";-->
  <!--      amountDiv.style.display = "none";-->
  <!--    }-->
  <!--  }-->
  <!--</script>-->
  
</body>

</html>