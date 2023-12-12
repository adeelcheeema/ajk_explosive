<?php
include_once('get_comments.php');
include_once('add_comments.php');
?>
<h4 class="mt-3">Comments</h4>
<table class="table table-bordered mt-3">
    <tbody>
        <?php
        while ($row_comments = $comments->fetch_assoc()) {
        ?>
            <tr>
                <th style="width: 30%;"><span >
                        <?php
                        echo $row_comments['created_at']
                        ?></span></th>
                <td style="width: 70%;" id="company_name" name="company_name">
                    <div class="form-group col-sm-6 p-0">
                        <?php switch ($row_comments['office_name']) {
                            case 6: ?>
                                <span class="badge badge-pill badge-info">Explosive Department</span>
                            <?php
                                break;
                            case 5: ?>
                                <span class="badge badge-pill badge-primary">Home Department</span>
                            <?php
                                break;
                            case 4: ?>
                                <span class="badge badge-pill badge-warning">DC Office</span>
                            <?php
                                break;
                            default:
                            ?>
                                <span></span>
                        <?php
                                break;
                        } ?>
                        <p>
                            <?php echo $row_comments['comments'] ?>
                        </p>
                    </div>
                </td>
            </tr> <?php } ?>

        <tr>
            <td style="width: 30%;"><span class="badge badge-pill badge-dark"></span></td>
            <td>
                <form id="myForm" class="col-sm-12" method="post" action="../components/comments/process_comments.php?l_id=<?php echo $l_id ?>">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <textarea type="text" class="form-control form-control-lg comments" id="comments" name="comments"> </textarea>
                        </div>
                        <div class="col-sm-12 text-center">
                            <button id="submitBtn" type="submit" class="btn btn-primary btn-sm text-center">Add Comment</button>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
    </tbody>
</table>