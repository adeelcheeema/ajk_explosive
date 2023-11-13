<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>User Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<?php
include('../get_godams.php');
?>

<body>
    <div class="container mt-5">
        <h2>User Registration</h2>
        <form method="POST" action="process_registration.php">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" class="form-control" id="full_name" name="full_name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" id="role" name="role">
                    <option value="zone">Zone Inspector</option>
                    <option value="godown">Godown Inspector</option>
                    <option value="mill">Mill Inspector</option>
                    <option value="depo">Depo Inspector</option>
                </select>
            </div>
            
            
            
          <div class="form-group">
            <label for="millName">Godown Name:</label>
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
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        document.getElementById('role').addEventListener('change', function() {
            var role = this.value;
            if (role === 'godown') {
                document.getElementById('location').style.display = 'block';
            } else {
                document.getElementById('location').style.display = 'none';
            }
        });
    </script>
</body>
</html>
