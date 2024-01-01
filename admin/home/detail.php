<?php include('get_data_id.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Inventory Management</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-control {
            background-color: #d3d3d3;
            color: "black";
            border: 0px;
        }

        .comments {
            border: 2px solid #22245d;
            background-color: #fff;
        }

        .close {
            top: 30px;
            position: absolute;
            float: right;
            right: 30px;
            font-size: 3rem;
            font-weight: 700;
            line-height: 1;
            color: #fff;
            text-shadow: 0;
            opacity: 1;
        }

        /* Modal Content (image) */
        .modal-content {
            object-fit: contain;
            margin: auto;
            display: block;
            width: 90%;
            height: 90%;
            background-color: transparent;
            margin-top: 3%;
        }
    </style>
</head>


<body>
    <div class="container mt-5 mb-5">
        <div>
            <h4 class="mb-4 text-center">NOC / License Form - Home Office</h4>

            <table class="table table-bordered">

                <?php
                while ($row_d = $depo->fetch_assoc()) {
                ?>

                    <thead>
                        <th style="width: 30%;">Application ID</th>
                        <th style="width: 70%;"> <?php echo "LIC_" . $row_d['id'] ?></th>
                    </thead>
                    <tbody>
                    <tr>
                            <th> Licence Type:</th>
                            <td id="licence_type" name="licence_type">
                                <?php echo $row_d['licence_type'] ?>
                            </td>

                        </tr>
                        <tr>
                            <th> Company Name:</th>
                            <td id="company_name" name="company_name">
                                <?php echo $row_d['company_name'] ?>
                            </td>

                        </tr>
                        <tr>
                            <th>Contractor Name:</th>
                            <td type="text" class="" id="contractor_name" name="contractor_name">
                                <?php echo $row_d['contractor_name'] ?>
                            </td>

                        </tr>
                        <tr>
                            <th>CNIC(Owner):</th>
                            <td type="text" class="" id="owner_cnic" name="owner_cnic">
                                <?php echo $row_d['owner_cnic'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>CNIC(Contractor):</th>
                            <td type="text" class="" id="contractor_cnic" name="contractor_cnic">
                                <?php echo $row_d['contractor_cnic'] ?>
                            </td>

                        </tr>
                        <tr>
                            <th>Company Registration:</th>
                            <td type="text" class="" id="company_reg" name="company_reg">
                                <?php echo $row_d['company_reg'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Project Name:</th>
                            <td type="text" class="" id="project_name" name="project_name">
                                <?php echo $row_d['project_name'] ?>
                            </td>

                        </tr>
                        <tr>
                            <th>Department Name:</th>
                            <td type="text" class="" id="dept_name" name="dept_name">
                                <?php echo $row_d['dept_name'] ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Quantity Required:</th>
                            <td type="text" class="" id="quality_req" name="quality_req">
                                <?php echo $row_d['quality_req'] ?>
                            </td>

                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td type="text" class="" id="address_loc" name="address_loc">
                                <?php echo $row_d['address_loc'] ?>
                            </td>

                        </tr>
                        <tr>
                            <th>Project Location:</th>
                            <td type="text" class="" id="project_loc" name="project_loc">
                                <?php echo $row_d['project_loc'] ?>
                            </td>
                        </tr>




                    <?php
                    $isLicense = $row_d['is_license'];

                    $isDC = $row_d['is_dc'];
                    $isNOC = $row_d['is_noc'];
                    $usId = $row_d['id'];
                    $l_id = $row_d['id'];
                    $imagePaths = explode(",", $row_d['attachments']);
                }
                    ?>
                    </tbody>
            </table>

            <?php include_once('../components/attachments/view_attachments.php') ?>
            <?php include_once('../components/comments/add_comments.php') ?>


            <table class="table table-bordered mt-3">
                <tbody>
                    <tr>
                        <th style="width: 30%;">Status:</th>
                        <td style="width: 70%;">
                            <?php

                            switch (true) {
                                case $isLicense == 1:
                            ?>
                                    <a class="badge badge-pill badge-success">
                                        License Issued
                                    </a>
                                <?php
                                    break;
                                case $isLicense == 2:
                                ?>
                                    <a class="badge badge-pill badge-dark">
                                        License Rejected
                                    </a>
                                <?php
                                    break;


                                case $isNOC == 1:
                                ?>
                                    <a class="badge badge-pill badge-success">
                                        NOC Issued
                                    </a>
                                <?php
                                    break;
                                case $isNOC == 2:
                                ?>
                                    <a class="badge badge-pill badge-dark">
                                        NOC Rejected
                                    </a>
                                <?php
                                    break;
                                default:
                                ?>
                                    <div class="form-group col-sm-6 d-flex ">
                                        <a class="btn btn-success mr-2" href="forward.php?aa=<?php echo $usId ?>">
                                        Issue NOC
                                        </a>
                                        <a class="btn btn-danger" href="forward.php?rr=<?php echo $usId ?>">
                                            Reject NOC
                                        </a>
                                    </div>
                        </td>
                <?php
                            }
                ?>

                    <tr>


                </tbody>
            </table>


            <div id="myModal" class="modal" style="display: none;background-color: #000000b5;align-items: center;border-width: 0px;">
                <span class="close">×</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>


        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            function myFunction(imgs) {
                var modal = document.getElementById("myModal");
                var img01 = document.getElementById("img01");
                modal.style.display = "block";
                img01.src = imgs.src;
            }

            var span = document.getElementsByClassName("close")[0];
            var modal = document.getElementById("myModal");
            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            modal.onclick = function() {
                modal.style.display = "none";
            }
        </script>
</body>

</html>