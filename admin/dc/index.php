<?php include('get_data.php'); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Explosive Management</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=" https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

  <style>
    a:hover {
      text-decoration: none;
    }

    .career-form {
      background-color: #4e63d7 !important;
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
      border: solid #0001;
      padding: 10px;
    }

    ul {
      list-style: none;
    }

    .list-disk li {
      list-style: none;
      margin-bottom: 12px;
    }

    .list-disk li:last-child {
      margin-bottom: 0;
    }

    .job-box .top-holder {
      /* padding: 4px; */
      font-family: "Open Sans", sans-serif;
      color: #fff;
      font-size: 16px;
      font-weight: 700;
      justify-content: flex-start;
      flex: 1;
    }

    .job-box .img-holder {
      padding: 8px;
      justify-content: center;
      font-family: "Open Sans", sans-serif;
      color: #fff;
      font-size: 16px;
      font-weight: 700;
      flex: 1;
      border-radius: 20px;
    }

    .job-box .holder {
      justify-content: flex-start;
      color: black;
      font-family: "Open Sans", sans-serif;
      font-size: 16px;
      font-weight: 700;
      flex: 1;
      align-items: baseline;
    }

    .job-box .edit {
      padding: 10px;
      justify-content: flex-start;
      background-color: white;
      color: black;
      font-family: "Open Sans", sans-serif;
      font-size: 16px;
      font-weight: 700;
      flex: 1;
      border-radius: 20px;
      align-items: baseline;
    }

    .holder-red {
      color: red !important;
    }

    .holder-stock {
      color: #4e63d7 !important;
    }

    .holder-top {
      justify-content: flex-start;
      background-color: #f3f3f3 !important;

    }

    .career-title {
      background-color: #4e63d7;
      color: #fff;

      text-align: flex-start;
      /* border-radius: 10px 10px 0 0;
      background-image: -webkit-gradient(linear, left top, right top, from(rgba(78, 99, 215, 0.9)), to(#5a85dd));
      background-image: linear-gradient(to right, rgba(78, 99, 215, 0.9) 0%, #5a85dd 100%); */
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
      margin-bottom: 4px;
      margin-TOP: 4px;
    }

    .text_quan {
      font-size: 16px;
      font-style: italic;
      margin-left: 5px;
    }
  </style>
</head>


<body>
  <div class="container-fluid p-1">
    <div class="row">

      <div class="col-sm-12 p-3">

        <div class="row">
          <div class="col-lg-12 mx-auto">
            <div class="d-flex justify-content-end p-4">
              <a class="btn btn-success btn-lg" href="dc/register.php">
                Add New Record
              </a>
            </div>
          </div>
          <div class="col-lg-12 mx-auto">

            <table class="table table-bordered">
              <thead>
                <th>Company Name</th>
                <th>Contractor Name</th>
                <th>Department Name</th>
                <th>Quantity Required</th>
                <th>Status</th>
              </thead>
              <tbody>
                <?php
                while ($row_d = $depo->fetch_assoc()) {
                ?>
                  <tr>
                    <td class="">
                      <?php echo $row_d['company_name'] ?>
                    </td>
                    <td class="">
                      <?php echo $row_d['contractor_name'] ?>
                    </td>
                    <td class="">
                      <?php echo $row_d['dept_name'] ?>
                    </td>
                    <td class="">
                      <?php echo $row_d['quality_req'] ?>
                    </td>
                    <td>
                      <?php
                      $isLicense = $row_d['is_license'];
                      $isDC = $row_d['is_dc'];
                      $isHome = $row_d['is_home'];
                      $isNOC = $row_d['is_noc'];
                      switch (true) {
                        case $isLicense == 1:
                      ?>
                          <a class="badge badge-pill badge-success" href="dc/detail.php?dd=<?php echo $row_d['id'] ?>">
                            License Issued
                          </a>
                        <?php
                          break;
                        case $isLicense == 2:
                        ?>
                          <a class="badge badge-pill badge-dark" href="dc/detail.php?dd=<?php echo $row_d['id'] ?>">
                            License Rejected
                          </a>
                        <?php
                          break;
                        case $isDC == 1:
                        ?>
                          <a class="badge badge-pill badge-warning" href="dc/detail.php?dd=<?php echo $row_d['id'] ?>">
                            Forwarded to Explosive
                          </a>
                        <?php
                          break;
                        case $isDC == 2:
                        ?>
                          <a class="badge badge-pill badge-dark" href="dc/detail.php?dd=<?php echo $row_d['id'] ?>">
                            Application Rejected
                          </a>
                        <?php
                          break;

                        case $isNOC == 1:
                        ?>
                          <a class="badge badge-pill badge-success" href="dc/detail.php?dd=<?php echo $row_d['id'] ?>">
                            NOC Issued
                          </a>
                        <?php
                          break;
                        case $isNOC == 2:
                        ?>
                          <a class="badge badge-pill badge-dark" href="dc/detail.php?dd=<?php echo $row_d['id'] ?>">
                            NOC Rejected
                          </a>
                        <?php
                          break;
                        case $isHome:
                        ?>
                          <a class="badge badge-pill badge-info" href="dc/detail.php?dd=<?php echo $row_d['id'] ?>">
                            Forwarded to Home Department
                          </a>
                        <?php
                          break;
                        default:
                        ?>
                          <a class="btn btn-sm btn-primary" href="dc/detail.php?dd=<?php echo $row_d['id'] ?>">
                            View Detail
                          </a>
                      <?php
                      }
                      ?>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Include Bootstrap JS and jQuery (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
      new DataTable('#datatable');
      new DataTable('#datatableMill');
    </script>


</body>

</html>