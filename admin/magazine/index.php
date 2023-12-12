<?php include('process.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazine Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .imagePreview {
            width: 100%;
            height: 180px;
            background-position: center center;
            background: url(./images/missing-image.png);
            background-color: #fff;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: inline-block;
        }

        .btn-primary {
            display: block;
            border-radius: 0px;
            margin-top: -5px;
        }

        .imgUp {
            margin-bottom: 15px;
        }

        .del {
            position: absolute;
            top: 0px;
            right: 15px;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            background-color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            color: black
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active mb-3" id="v-pills-home-tab" data-toggle="pill" data-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Add Inventory</button>
                <button class="nav-link mb-location mb-3" id="v-pills-profile-tab" data-toggle="pill" data-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Issued Inventory</button>
                <button class="nav-link" id="v-pills-ret-tab" data-toggle="pill" data-target="#v-pills-ret" type="button" role="tab" aria-controls="v-ret-profile" aria-selected="false">Return Inventory</button>
            </div>
        </div>
        <div class="col-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <form id="myForm" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="receivedLotNum">Received Lot Number:</label>
                            <input type="text" required class="form-control" id="receivedLotNum" name="receivedLotNum">
                        </div>
                        <div class="form-group">
                            <label for="weightOfLot">Weight of Lot (kg):</label>
                            <input type="number" required class="form-control" id="weightOfLot" name="weightOfLot">
                        </div>
                        <div class="form-group col-sm-3 p-0 imgUp">
                            <label>Attachment : </label>
                            <div class="imagePreview"></div>
                            <label class="btn btn-primary">Upload<input type="file" name="userfile" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;"></label>
                        </div>
                        <button type="submit" name="add-btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <form id="myForm" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="contractor_id">Contractor Name:</label>
                            <select class="form-control" id="contractor_id" name="contractor_id" onchange="updateApprovedQuantity()">
                                
                            <?php foreach ($rows_send as $row_d) { ?>
                                <option value=<?php echo $row_d['id'] ?>> <?php echo $row_d['contractor_name'] ?> </option>
                                <?php } ?>
                               
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity_approved">Quantity Aprroved (kg):</label>
                            <input class="form-control" id="quantity_approved" disabled>

                        </div>

                        <div class="form-group">
                            <label for="explosive_quan">Explosive Issued Quantity (kg):</label>
                            <input type="number" required class="form-control" id="explosive_quan" name="explosive_quan">
                        </div>
                        <div class="form-group">
                            <label for="location">Consumption Location:</label>
                            <input type="text" required class="form-control" id="location" name="location">
                        </div>
                        <div class="form-group col-sm-3 p-0 imgUp2">
                            <label>Attachment : </label>
                            <div class="imagePreview"></div>
                            <label class="btn btn-primary">Upload<input type="file" name="userfile-send" class="uploadFile2 img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;"></label>
                        </div>
                        <button type="submit" name="send-btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="v-pills-ret" role="tabpanel" aria-labelledby="v-pills-ret-tab">
                <form id="myForm" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="contractor_name_ret">Contractor Name:</label>
                            <select class="form-control" id="contractor_name_ret" name="contractor_name_ret" onchange="updateQuantity()">
                                <option>Select Contractor</option>
                                <?php foreach ($rows_ret as $row_d) { ?>
                                    <option value="<?php echo $row_d['id']; ?>"><?php echo $row_d['contractor_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity_issued_ret">Quantity Issued (kg):</label>
                            <input class="form-control" id="quantity_issued_ret" name="quantity_issued_ret" disabled>
                            <input class="form-control" id="contractor_id_ret" name="contractor_id_ret" hidden >
                            <input class="form-control" id="inventory_id" name="inventory_id" hidden >
                        </div>
                        <div clauserfile-retss="form-group">
                            <label for="quan_ret">Quantity Return (kg):</label>
                            <input type="number" required class="form-control" id="quan_ret" name="quan_ret">
                        </div>
                        <div class="form-group col-sm-3 p-0 imgUp3">
                            <label>Attachment : </label>
                            <div class="imagePreview"></div>
                            <label class="btn btn-primary">Upload<input type="file" name="userfile-ret" class="uploadFile3 img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;"></label>
                        </div>
                        <button type="submit" name="ret-btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js Links (Required for Bootstrap functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $('#myTab button').on('click', function(event) {
            event.preventDefault()
            $(this).tab('show')
        })
    </script>
    <script>
        $(function() {
            $(document).on("change", ".uploadFile", function() {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return;
                if (/^image/.test(files[0].type)) {
                    var reader = new FileReader();
                    reader.readAsDataURL(files[0]);
                    reader.onloadend = function() {
                        uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                    }
                }

            });
            $(document).on("change", ".uploadFile2", function() {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return;
                if (/^image/.test(files[0].type)) {
                    var reader = new FileReader();
                    reader.readAsDataURL(files[0]);
                    reader.onloadend = function() {
                        uploadFile.closest(".imgUp2").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                    }
                }

            });

        $(document).on("change", ".uploadFile3", function() {
                var uploadFile = $(this);
                var files = !!this.files ? this.files : [];
                if (!files.length || !window.FileReader) return;
                if (/^image/.test(files[0].type)) {
                    var reader = new FileReader();
                    reader.readAsDataURL(files[0]);
                    reader.onloadend = function() {
                        uploadFile.closest(".imgUp3").find('.imagePreview').css("background-image", "url(" + this.result + ")");
                    }
                }

            });
        });
    </script>
    <script>
        function updateQuantity() {
            var selectedContractor = document.getElementById("contractor_name_ret");
            var quantityConsumedInput = document.getElementById("quantity_issued_ret");
            var contractorId = document.getElementById("contractor_id_ret");
            var inventoryId = document.getElementById("inventory_id");
            var selectedContractorId = selectedContractor.value;
            var selectedContractorData = <?php echo json_encode($rows_ret); ?>;
            var selectedContractorInfo = selectedContractorData.find(row => row.id == selectedContractorId);
            if (selectedContractorInfo) {
                quantityConsumedInput.value = selectedContractorInfo.explosive_quan;
                contractorId.value = selectedContractorId
                inventoryId.value =  selectedContractorInfo.id;
            } else {
                quantityConsumedInput.value = "";
                contractorId.value = "";
            }
        }

        function updateApprovedQuantity() {
            var selectedContractorApp = document.getElementById("contractor_id");
            var quantityApproved = document.getElementById("quantity_approved");
            var selectedContractorAppId = selectedContractorApp.value;
            var selectedContractorAppData = <?php echo json_encode($rows_send); ?>;
            var selectedContractorAppInfo = selectedContractorAppData.find(row => row.id == selectedContractorAppId);
            if (selectedContractorAppInfo) {
                quantityApproved.value = selectedContractorAppInfo.quality_req;
            } else {
                selectedContractorApp.value = "";
            }quantityApproved
        }
    </script>
</body>

</html>