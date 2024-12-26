<?php
include "header.php";
include "sidebar.php";
$cate = $products->getAllItemByCateid($_GET['id']);
// var_dump($cate);
?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i>
                Home</a></div>
        <h1>Update Items</h1>
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
                        <form action="edititem.php" method="post" class="form-horizontal" enctype="multipart/form-data">

                            <div class="control-group">
                                <label class="control-label">name </label>
                                <div class="controls">
                                    <?php
                                    // foreach ($cate as $value):
                                    ?>
                                    <input type="hidden" type ="hidden" name ="id" value="<?php echo $cate[0]['id']?>">
                                    <input type="text" class="span11" name="name" value="<?php echo $cate[0]['name'] ?>" /> *

                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">manu_id
                                </label>
                                <div class="controls">
                                    <?php
                                    ?>
                                    <input type="number" class="span11" name="manu_id" value="<?php echo $cate[0]['manu_id'] ?>" /> *
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">type_id
                                </label>
                                <div class="controls">
                                    <?php

                                    ?>
                                    <input type="number" class="span11" name="type_id" value="<?php echo $cate[0]['type_id'] ?>" /> *

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">price </label>
                                <div class="controls">
                                    <?php

                                    ?>
                                    <input type="text" class="span11" name="price" value="<?php echo $cate[0]['price'] ?>" /> *

                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Choose
                                    an image</label>
                                <div class="controls">
                                    <input type="file" name="fileUpload" id="fileUpload">
                                    <img src="../AnhDoAn/<?php echo $cate[0]['image'] ?>" alt="">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">description</label>
                                <div class="controls">
                                    <?php


                                    ?>
                                    <textarea class="span11" name="description"> <?php echo $cate[0]['description'] ?></textarea>*

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Featured
                                </label>
                                <div class="controls">
                                    <select name="featured" id="featured">
                                        <?php
                                        foreach ($cate as $value) :
                                            if ($cate[0]['feature']=='1') : ?>
                                                <option selected value="<?php echo $value['feature']  ?>">Yes</option>
                                            <?php
                                            else :
                                            ?>
                                                <option value="<?php echo $value['feature']  ?>">No</option>
                                        <?php endif;
                                        endforeach; ?>
                                    </select> *
                                    <!-- <select name="featured" id="featured">
                                        <?php
                                        // $getallmanu = $manufacture->getAllmanufactures();
                                        // foreach ($getallmanu as $value):
                                        ?>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select> * -->

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Quantity
                                </label>
                                <div class="controls">
                                    <?php

                                    ?>
                                    <input type="number" class="span11" name="Quantity" value="<?php echo $cate[0]['Quantity'] ?>" /> *

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">bestsellingProduct </label>
                                <div class="controls">
                                    <?php

                                    ?>
                                    <input type="text" class="span11" name="bestsellingProduct" value="<?php echo $cate[0]['BestSellingProducts'] ?> " /> *

                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">priceDiscocunt </label>
                                <div class="controls">
                                    <?php

                                    ?>
                                    <input type="text" class="span11" name="priceDiscocunt" value="<?php echo $cate[0]['PriceDiscount'] ?>" /> *

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
                                    <?php
                                    ?>
                                    <input type="number" class="span11" name="All" value="<?php echo $cate[0]['ALL'] ?>" /> *
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
<?php include "footer.php" ?>