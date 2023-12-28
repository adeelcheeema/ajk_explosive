<?php include('process.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Inventory Management</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
       
        .imagePreview {
            width: 100%;
            height: 180px;
            background-position: center center;
            background: url(../images/missing-image.png);
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
    <div class="container mt-5 mb-5">
        <div>
            <h1 class="mb-4 text-center">NOC / License Form</h1>
            <h1 class="mb-4 text-center">DC Office
            </h1>
            <form id="myForm" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="form-group col">
                        <label for="company_name">Company Name:</label>
                        <input type="text" required class="form-control form-control-lg" id="company_name" name="company_name">
                    </div>

                    <div class="form-group col">
                        <label for="contractor_name">Contractor Name:</label>
                        <input type="text" required class="form-control form-control-lg" id="contractor_name" name="contractor_name">

                    </div>

                    <div class="form-group col">
                        <label for="owner_cnic">CNIC(Owner):</label>
                        <input type="number" required class="form-control form-control-lg" id="owner_cnic" name="owner_cnic">

                    </div>
                    <div class="form-group col">
                        <label for="contractor_cnic">CNIC(Contractor):</label>
                        <input type="number" required class="form-control form-control-lg" id="contractor_cnic" name="contractor_cnic">
                    </div>

                    <div class="form-group col">
                        <label for="company_reg">Company Registration:</label>
                        <input type="text" required class="form-control form-control-lg" id="company_reg" name="company_reg">
                    </div>

                </div>


                <div class="row">
                    <div class="form-group col">
                        <label for="Project_name">Project Name:</label>
                        <input type="text" required class="form-control form-control-lg" id="project_name" name="project_name">
                    </div>

                    <div class="form-group col">
                        <label for="dept_name">Department Name:</label>
                        <input type="text" required class="form-control form-control-lg" id="dept_name" name="dept_name">

                    </div>

                    <div class="form-group col">
                        <label for="quality_req">Quantity Required (kg):</label>
                        <input type="number" required class="form-control form-control-lg" id="quality_req" name="quality_req">

                    </div>
                    <div class="form-group col">
                        <label for="address_loc">Address:</label>
                        <input type="text" required class="form-control form-control-lg" id="address_loc" name="address_loc">
                    </div>

                    <div class="form-group col">
                        <label for="project_loc">Project Location:</label>
                        <input type="text" required class="form-control form-control-lg" id="project_loc" name="project_loc">
                    </div>
                </div>
    
        <div class="row">
        <div class="form-group col imgUp">
            <label >Attachment 1:</label>
                <div class="imagePreview"></div>
                <label class="btn btn-primary">Upload<input required type="file" name="userfile[]" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;"></label>
            </div>

            <div class="form-group col imgUp">
            <label >Attachment 2:</label>
                <div class="imagePreview"></div>
                <label class="btn btn-primary">Upload<input required type="file" name="userfile[]" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;"></label>
            </div>

            <div class="form-group col imgUp">
            <label >Attachment 3:</label>
                <div class="imagePreview"></div>
                <label class="btn btn-primary">Upload<input required type="file" name="userfile[]" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;"></label>
            </div>

            <div class="form-group col imgUp">
            <label >Attachment 4:</label>
                <div class="imagePreview"></div>
                <label class="btn btn-primary">Upload<input required type="file" name="userfile[]" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;"></label>
            </div>

            <div class="form-group col imgUp">
            <label>Attachment 5:</label>
                <div class="imagePreview"></div>
                <label class="btn btn-primary">Upload<input required type="file" name="userfile[]" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;"></label>
            </div>
    
            <div class="text-center col-sm-12 d-flex justify-content-center">
                <button id="submitBtn" type="submit" class="btn btn-primary btn-lg text-center">Submit</button>
            </div>
        </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        });
    </script>
</body>

</html>