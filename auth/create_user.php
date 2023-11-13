<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>User Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php
include('./get_reg_detail.php');
?>

<body>
    <div class="container mt-5">
        <h2>User Registration</h2>
        <form method="POST" action="process_registration.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control form-control-lg" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control form-control-lg" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control form-control-lg" id="full_name" name="full_name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control form-control-lg" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control form-control-lg" id="role" name="role">
                   
                    <option value="zone">Zone Inspector</option>
                    <option value="godown">Godown Inspector</option>
                    <option value="mill">Mill Inspector</option>
                    <option value="depo">Depo Inspector</option>
                </select>
            </div>
            
            
            
          <div class="form-group d-none " id="godown_in">
            <label for="millName">Select Godown :</label>
            <select class="form-control form-control-lg" id="godown" name="godown">
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
          
          
                    <div class="form-group d-none " id="mill_in">
            <label for="millName">Select Mill :</label>
            <select class="form-control form-control-lg" id="godown" name="godown">
               <?php
              if (mysqli_num_rows($mills)) {
                echo '<option value="">Select Godown</option>';
                while ($mill = $mills->fetch_assoc()) {
                  echo '<option value="' . $mill["id"] . '">' . $mill["mill_name"] . '</option>';
                }
              } else {
                echo '<option value="">No Mill Found</option>';
              }
              ?>
            </select>
          </div>
          
          
                    <div class="form-group d-none " id="depo_in">
            <label for="millName">Select Depo :</label>
            <select class="form-control form-control-lg" id="godown" name="godown">
               <?php
              if (mysqli_num_rows($depos)) {
                echo '<option value="">Select Godown</option>';
                while ($depo = $depos->fetch_assoc()) {
                  echo '<option value="' . $depo["id"] . '">' . $depo["depo_name"] . '</option>';
                }
              } else {
                echo '<option value="">No Godown Found</option>';
              }
              ?>
            </select>
          </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

   <script>
    document.getElementById('role').addEventListener('change', function () {
        var role = this.value;
        var godownInput = document.getElementById('godown_in');
        var millInput = document.getElementById('mill_in');
        var depoInput = document.getElementById('depo_in');

        // Hide all inputs
        godownInput.style.display = 'none';
        millInput.style.display = 'none';
        depoInput.style.display = 'none';

        // Show the input corresponding to the selected role
        if (role === 'godown') {
            godownInput.style.display = 'block !important';
        } else if (role === 'mill') {
            millInput.style.display =  'block !important';
        } else if (role === 'depo') {
            depoInput.style.display =  'block !important';
        }
    });
</script>


</body>
</html>
