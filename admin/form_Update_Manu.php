<?php
include "header.php";
include "sidebar.php";

if (isset($_GET['id'])):
    $id = $_GET['id'];
    $getManuById = $manufacture->getManuById($id);
//     echo "<pre>";
// print_r($getManuById);
// echo "</pre>";

?>

<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom current">
                <i class="icon-home"></i> Home
            </a>
        </div>
        <h1>Update Manu</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"><i class="icon-align-justify"></i></span>
                        <h5>Item info</h5>
                    </div>
                    
                    <div class="widget-content nopadding">
                        <!-- BEGIN FORM -->
                        <form action="update_Manu.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Name</label>
                                <div class="controls">
                                    <input type="hidden" name="id" value="<?php echo $getManuById[0]['manu_id']?>">
                                    <input type="text" class="span11" name="name" value="<?php echo $getManuById[0]['manu_name']?>" /> *
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Manu ID</label>
                                <div class="controls">
                                    <input type="number" class="span11" name="manu_id" value="<?php echo $getManuById[0]['manu_id']?>" /> *
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Choose an image </label>
                                <div class="controls">
                                    <input type="file" name="fileUpload" id="fileUpload">
                                    <img src="../AnhDoAn/<?php echo $getManuById[0]['image_manu']?>" alt="Current Image">
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END FORM -->
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->

<?php
endif;
include "footer.php";
?>
