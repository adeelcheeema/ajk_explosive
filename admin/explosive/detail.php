<?php include('get_data_id.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Inventory Management</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f0f0;
        }

        .form-control {
            background-color: #d3d3d3;
            color: "black";
            border: 0px;
        }

        .comments {
            border: 2px solid #22245d;
            background-color: #fff;
        }
    </style>
</head>


<body>
    <div class="container mt-5 mb-5">
        <div>
            <h1 class="mb-4 text-center">NOC / License Form</h1>
            <h1 class="mb-4 text-center">Explosive Office
            </h1>

            <?php
            while ($row_d = $depo->fetch_assoc()) {
            ?>

                <div class="row">
                    <div class="form-group col-sm-3">
                        <label for="company_name">Company Name:</label>
                        <div class="form-control form-control-lg" id="company_name" name="company_name">
                            <?php echo $row_d['company_name'] ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="contractor_name">Contractor Name:</label>
                        <div type="text" class="form-control form-control-lg" id="contractor_name" name="contractor_name">
                            <?php echo $row_d['contractor_name'] ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="owner_cnic">CNIC(Owner):</label>
                        <div type="text" class="form-control form-control-lg" id="owner_cnic" name="owner_cnic">
                            <?php echo $row_d['owner_cnic'] ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="contractor_cnic">CNIC(Contractor):</label>
                        <div type="text" class="form-control form-control-lg" id="contractor_cnic" name="contractor_cnic">
                            <?php echo $row_d['contractor_cnic'] ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="company_reg">Company Registration:</label>
                        <div type="text" class="form-control form-control-lg" id="company_reg" name="company_reg">
                            <?php echo $row_d['company_reg'] ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="project_name">Project Name:</label>
                        <div type="text" class="form-control form-control-lg" id="project_name" name="project_name">
                            <?php echo $row_d['project_name'] ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="dept_name">Department Name:</label>
                        <div type="text" class="form-control form-control-lg" id="dept_name" name="dept_name">
                            <?php echo $row_d['dept_name'] ?>
                        </div>

                    </div>
                    <div class="form-group col-sm-3">
                        <label for="quality_req">Quantity Required:</label>
                        <div type="text" class="form-control form-control-lg" id="quality_req" name="quality_req">
                            <?php echo $row_d['quality_req'] ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="address_loc">Address:</label>
                        <div type="text" class="form-control form-control-lg" id="address_loc" name="address_loc">
                            <?php echo $row_d['address_loc'] ?>
                        </div>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="project_loc">Project Location:</label>
                        <div type="text" class="form-control form-control-lg" id="project_loc" name="project_loc">
                            <?php echo $row_d['project_loc'] ?>
                        </div>
                    </div>


                    <?php
                    $isLicense = $row_d['is_license'];
                    $comments = $row_d['comments'];
                    $isDC = $row_d['is_dc'];
                    switch (true) {
                        case $isLicense == 1:
                    ?>
                            <div class="form-group col-sm-3">
                                <label for="project_loc">Status:</label>
                                <div type="text" class="form-control form-control-lg bg-success text-white" id="project_loc" name="project_loc">
                                    License Issued
                                </div>
                            </div>
                        <?php
                            break;
                        case $isLicense == 2:
                        ?>
                            <div class="form-group col-sm-3">
                                <label for="project_loc">Status:</label>
                                <div type="text" class="form-control form-control-lg bg-danger text-white" id="project_loc" name="project_loc">
                                    License Rejected
                                </div>
                            </div>

                        <?php
                            break;
                        case $comments:
                        ?>
                            <div class="form-group col-sm-12">
                                <label for="comments">DC comments:</label>
                                <div type="text" class="form-control form-control-lg" id="comments" name="comments">
                                    <?php echo $row_d['comments'] ?>
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <a class="btn btn-success" href="forward.php?aa=<?php echo $row_d['id'] ?>">
                                    Accept License
                                </a>
                            </div>
                            <div class="form-group col-sm-2">
                                <a class="btn btn-danger" href="forward.php?rr=<?php echo $row_d['id'] ?>">
                                    Reject Licence
                                </a>
                            </div>
                        <?php
                            break;
                        case $isDC:
                        ?>
                            <div class="form-group col-sm-3">
                                <label for="project_loc">Status:</label>
                                <div type="text" class="form-control form-control-lg bg-warning text-dark" id="project_loc" name="project_loc">
                                    Moved To DC
                                </div>
                            </div>
                        <?php
                            break;
                        default:
                        ?>
                            <div class="form-group col-sm-12 text-center">
                                <a class="btn btn-success" href="forward.php?dd=<?php echo $row_d['id'] ?>">
                                    Forward To DC
                                </a>
                            </div>
                    <?php
                    }
                    $imagePaths = explode(",", $row_d['attachments']);
                    echo '<div class="col-sm-12">';
                    echo '<div class="row">';
                    foreach ($imagePaths as $imagePath) {
                        echo '<div class="col-md-3 mb-3">';
                        echo '<img src="http://localhost/explosive/admin/uploads/' . $imagePath . '" class="img-fluid">';
                        echo '</div>';
                    }
                    echo '</div></div>';
            }
                ?>
                </div>
        </div>
        <!-- Include Bootstrap JS and jQuery (optional) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>