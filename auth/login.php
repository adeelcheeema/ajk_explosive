<?php include('get_login.php') ?>
<html>

<head>
  <title>Inventory Management</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
  body{
      background-color:#0E0F2E;
      color:white;
  }
  
.logo {
    border-radius:20px;
}

   .form-control {
        background-color: #515277;
    border: 2px solid #22245d;
    color:white;
    }
   
  </style>
</head>

<body>

   <section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

       

        <div class="d-flex align-items-center justify-content-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form style="width: 23rem; margin-top:20vh" method="post">
              <a href="https://food.ajk.gov.pk/portal/">
               <img src="https://food.ajk.gov.pk/wp-content/uploads/2023/09/Screenshot-2023-09-26-at-3.05.41-PM.png" class="logo mb-4" height="180" alt="Food">
            </a>
      
            <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example18">Email address</label>
              <input type="email" id="username" name="username" required class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example28">Password</label>
              <input type="password" id="password" name="password" required class="form-control form-control-lg" />
           
            </div>

            <div class="pt-1 mb-4">
              <button class="btn btn-info btn-lg btn-block" type="submit" name="signin" id="signin">Login</button>
            </div>


          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="https://w0.peakpx.com/wallpaper/54/12/HD-wallpaper-wheat-crops-landscape-nature-senary.jpg"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
   
  <!-- Include Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>