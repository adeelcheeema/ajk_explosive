<h4 class="mt-3">Attachments</h4>
<table class="table table-bordered">
    <thead>
        <th style="width: 30%;">Attachment Name</th>
        <th style="width: 70%;"> </th>
    </thead>
    <tbody>
        <?php
        foreach ($imagePaths as $imagePath) {
        ?>
            <tr>
                <td>Affidavit</td>
                <td type="text" class="" id="project_loc" name="project_loc">
                    <img onclick="myFunction(this);" src="<?php echo "http://localhost/explosive/admin/uploads/" . $imagePath ?>" class="card-img-top" style="height: 200px;width:200px">
                </td>
                <tr />
            <?php } ?>
    </tbody>
</table>