<?php
include "header.php";
include "sidebar.php";
?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                Home</a></div>
        <h1>Add New Items</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Item info</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <!-- BEGIN FORM -->
                        <form action="addUser.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                        
                            <div class="control-group">
                                <label class="control-label">Username </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="name" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Password
                                </label>
                                <div class="controls">
                                    <input type="number" class="span11" name="Password" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Role </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="Role" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">All
                                </label>
                                <div class="controls">
                                    <input type="number" class="span11" name="All" /> *
                                </div>
                            </div>
                    
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success">Add</button>
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
<?php include "footer.php" ?>