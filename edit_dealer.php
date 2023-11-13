<!DOCTYPE html>
<html>

<head>
  <title>Inventory Management</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


  <style>
    a:hover {
      text-decoration: none;
    }

    .card {
      height: 140px;
      background-size: contain;
      margin: 0px;
      padding: 0px;
      display: flex;

      justify-content: center;
      padding-left: 20px;
      flex-direction: column;
      background-repeat: no-repeat;
      border-radius: 10px;
      background-position: right;
    }

    .card_mill {

      background-color: #00c851;

    }

    .card_depo {

      background-color: #144681;

    }

    .cat_heading {
      font-size: 40px;
      color: #144681;
      margin: 0px;

      font-weight: bold;
    }

    .cat_heading2 {
      color: #00c851;
    }

    .text_heading {
      font-size: 20px;
      margin: 0px;
      color: white;
    }

    .text_count {
      font-size: 50px;
      color: white;
      margin: 0px;

      font-weight: bold;
    }

    .text_quan {
      font-size: 16px;
      color: white;
      font-style: italic;
    }
  </style>
</head>

<?php

include_once 'conn.php';

$dd = $_GET['dd'] ?? null;
$dID = $_GET['dId'] ?? null;


if (!is_numeric($dd) || $dd <= 0) {
  die("Invalid Link");
}

$sql_villages = "SELECT v.id , v.name
FROM villages v
JOIN councils ON v.uc_id = councils.id
WHERE councils.district_id = $dd";

$sql = "SELECT * FROM dealers WHERE id = $dID";

$godams = $conn->query($sql);
$villages = $conn->query($sql_villages);


$conn->close();
?>



<body>
  <div class="container-fluid p-5">


    <div class="row">

      <div class="col-lg-10 mx-auto" id="mill">
        <h1 class="mb-4 text-center">Dealers List</h1>
<form>
        <table class="table table-striped" id="datatable">
          <thead>
            <tr>
              <th scope="col">Dealer Name</th>
              <th scope="col">Phone</th>
               <th scope="col">Village</th>
               <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $count = 1;
            while ($row_d = $godams->fetch_assoc()) { ?>
              <tr>
                <td> <?php echo $row_d["name"]; ?></td>
                <td> <?php echo $row_d["phone"]; ?></td>
                <td> <select class="form-control form-control-lg select_page" id="select_page" name="select_page">
                <?php
                 while ($row_v = $villages->fetch_assoc()) { ?>
                ?>
                  <option value="<?php echo $row_v["id"]; ?>"> <?php echo $row_v["name"]; ?></option>
                <?php

                }

                ?>
                <option value="">No Village Found</option>
              </select>
              </td>
               <td> <button class="btn btn-primary" type="submit">Update</button></td>
              </tr>
            <?php
              $count++;
            }
            ?>
          </tbody>
        </table>
       
      </div>



      </tbody>
      </table>
    </div>

  </div>

  </div>

  <!-- Include Bootstrap JS and jQuery (optional) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
 <script>
   $(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $("#select_page").select2();
});
  </script>
</body>

</html>