<!DOCTYPE html>
<html>

<head>
    <title>Inventory Management</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {

            background-color: #0E0F2E;
            color: white;
        }

        .container {
            background-color: #191D43;
            /* Add a semi-transparent white background to the form container */
            padding: 20px;
            border-radius: 10px;
        }

        .form-control {
            background-color: #515277;
            border: 2px solid #22245d;
            color: white;
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
      <div>
          <h1 class="mb-4 text-center">Inventory Management</h1>
          <h1 class="mb-4 text-center">DFC
            (
            <?php
      
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



                <div class="form-group col">
                    <label for="millName">Company Name:</label>
                    <input type="text" class="form-control form-control-lg" id="millname" name="millname">
                </div>

                <div class="form-group col">
                    <label for="contractorname">Contractor Name:</label>
                    <input type="text" class="form-control form-control-lg" id="contractorname" name="contractorname">

                </div>

                <div class="form-group col">
                    <label for="ownercnic">CNIC(Owner):</label>
                    <input type="text" class="form-control form-control-lg" id="ownercnic" name="ownercnic">

                </div>
                <div class="form-group col">
                    <label for="contractor_cnic">CNIC(Contractor):</label>
                    <input type="text" class="form-control form-control-lg" id="contractor_cnic" name="contractor_cnic">
                </div>

                <div class="form-group col">
                    <label for="companyreg">Company Registration:</label>
                    <input type="text" class="form-control form-control-lg" id="companyreg" name="companyreg">
                </div>

            </div>
        </form>
    
    <div class="row">
        <div class="form-group col">
            <label for="Project_name">Project Name:</label>
            <input type="text" class="form-control form-control-lg" id="project_name" name="project_name">
        </div>

        <div class="form-group col">
            <label for="dept_name">Department Name:</label>
            <input type="text" class="form-control form-control-lg" id="dept_name" name="dept_name">

        </div>

        <div class="form-group col">
            <label for="quality_req">Quality Required:</label>
            <input type="text" class="form-control form-control-lg" id="quality_req" name="quality_req">

        </div>
        <div class="form-group col">
            <label for="address">Address:</label>
            <input type="text" class="form-control form-control-lg" id="address" name="address">
        </div>

        <div class="form-group col">
            <label for="project_loc">Project Location:</label>
            <input type="text" class="form-control form-control-lg" id="project_loc" name="project_loc">
        </div>
      </div> 
    </div>





    <div class="row">
        <div class="col text-center">
        <input id="input-2" name="input2[]" type="file" class="file"  data-show-upload="false" data-show-caption="true" multiple>
        

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
        document.getElementById("myForm").addEventListener("submit", function (event) {
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