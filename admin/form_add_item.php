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
                        <form action="additem.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">name </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="name" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">manu_id
                                </label>
                                <div class="controls">
                                    <input type="number" class="span11" name="manu_id" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">type_id
                                </label>
                                <div class="controls">
                                    <input type="number" class="span11" name="type_id" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">price </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="price" /> *
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Choose
                                    an image</label>
                                <div class="controls">
                                    <input type="file" name="fileUpload" id="fileUpload">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">description</label>
                                <div class="controls">
                                    <textarea class="span11" name="description"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Featured
                                </label>
                                <div class="controls">
                                    <select name="featured" id="featured">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Quantity
                                </label>
                                <div class="controls">
                                    <input type="number" class="span11" name="Quantity" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">bestsellingProduct </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="bestsellingProduct" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">priceDiscocunt </label>
                                <div class="controls">
                                    <input type="text" class="span11" name="priceDiscocunt" /> *
                                </div>
                            </div>

                            <!-- <div class="control-group">
                                <label class="control-label">Content</label>
                                <div class="controls">
                                    <textarea class="span11" name="content"></textarea>
                                </div> -->
                            <!-- </div> -->
                            <div class="control-group">
                                <label class="control-label">All
                                </label>
                                <div class="controls">
                                    <input type="number" class="span11" name="All" /> *
                                </div>
                            </div>
                            <!-- <div class="control-group">
                        <label class="control-label">Author</label>
                        <div class="controls">
                            <select name="author" id="cate">
                                <option value="1">The Gioi</option>
                                <option value="2">The Thao</option>
                            </select> *
                        </div>
                    </div> -->
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