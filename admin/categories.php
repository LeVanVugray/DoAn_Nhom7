<?php
include "header.php";
include "sidebar.php";
$cate = 2;
// // hiển thị 5 sản phẩm trên 1 trang
$perpage = 2;
// // Lấy số trang trên thanh địa chỉ
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// // Tính tổng số dòng, ví dụ kết quả là 18
$total = count($manufacture->getAllmanufactures());
// // lấy đường dẫn đến file hiện hành
$url = $_SERVER['PHP_SELF'] . "?cate=" . $cate;

?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h1>Manage Categories</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="form_add_Manufacture.php"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Categories</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php 
                                $getallnameimage = $products->getallnameimage();
                                $getmanuByCate  = $manufacture->getmanuByName($page,$perpage);
                                // getAllmanufactures
                                // var_dump($getmanuByCate);
                                foreach ($getmanuByCate as $value) : ?>
                                <tr class="">
                                    <td width="100"><img src="../AnhDoAn/<?php echo $value['image_manu'] ?>"></td>
                                    <td><?php echo $value['manu_name']?></td>

                                    <td>
                                        <a href="form_Update_Manu.php?id=<?php echo $value ['manu_id']?>" class="btn
                                                    btn-success btn-mini">Edit</a>
                                        <a href="deleteManu.php?id=<?php echo $value['manu_id']?>" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" style="margin-left: 18px;">
                    <ul class="pagination">
                        <?php echo $products->paginate($url, $total, $perpage) ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>