<?php
include "header.php";
include "sidebar.php";

if (isset($_GET['id'])):
    $id = $_GET['id'];
    $getUserById = $Users->getUserById($id);
    //     echo "<pre>";
    // print_r($getUserById);
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
            <h1>Update User</h1>
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
                            <form action="UpdateUser.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" class="span11" name="User_Id" value="<?php echo $getUserById[0]['User_Id'] ?>" /> *
                                <div class="control-group">
                                    <label class="control-label">Username </label>
                                    <div class="controls">
                                        <input type="hidden" name="id" value="<?php echo $getUserById[0]['User_Id'] ?>">
                                        <input type="text" class="span11" name="name" value="<?php echo $getUserById[0]['Username'] ?>" /> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Password
                                    </label>
                                    <div class="controls">
                                        <input type="number" class="span11" name="Password" value="<?php echo $getUserById[0]['Password'] ?>" /> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Role </label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="Role" value="<?php echo $getUserById[0]['Role'] ?>" /> *
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">All
                                    </label>
                                    <div class="controls">
                                        <input type="number" class="span11" name="All" value="<?php echo $getUserById[0]['ALL'] ?>" /> *
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