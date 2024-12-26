<?php
// $email = isset($_POST['user']) ? trim($_POST['user']) : null;
session_start();
include "header.php";
include "sidebar.php";
// if (isset($_GET['cate'])) {
$cate = 2;
// // hiển thị 5 sản phẩm trên 1 trang
$perpage = 3;
// // Lấy số trang trên thanh địa chỉ
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$total = count($products->getAllItem());
$url = $_SERVER['PHP_SELF'] . "?cate=" . $cate;
?>
<!-- BEGIN CONTENT -->

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home"
                class="tip-bottom current"><i
                    class="icon-home"></i> Home</a></div>
        <h1>Manage Items</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a
                                href="form_add_item.php"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Items</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>name</th>
                                    <th>featured</th>
                                    <th>Quantity</th>
                                    <th>description</th>
                                    <th>price</th>
                                    <th>Author</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $getAllItem = $products->getAllItem();

                                $getAllItemAuthor = $products->getAuthorName();
                                $getAllItemAuthor = new Product;
                                // var_dump($getAllItemAuthor);
                                // $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                // $perpage = 3;
                                $getIiemByCate = $products->getItemByCate(0, $page, $perpage);
                                foreach ($getIiemByCate as $value):
                                ?>
                                    <tr class="">
                                        <td width="250">
                                            <img
                                                src="../AnhDoAn/<?php echo $value['image'] ?>" />
                                        </td>
                                        <td><?php echo $value['name'] ?></td>
                                        <td><?php echo $value['feature'] ?></td>
                                        <td><?php echo $value['Quantity'] ?></td>
                                        <td><?php echo $value['description'] ?></td>
                                        <td><?php echo $value['price'] ?>,000 VND</td>
                                        <td><?php echo $value['manu_id'] ?></td>
                                        <td><?php echo $value['created_at'] ?></td>
                                        <td>
                                            <a href="form_Update_item.php?id=<?php echo $value['id'] ?>" class="btn
                                                    btn-success btn-mini">Edit</a>
                                            <a href="delete.php?id=<?php echo $value['id'] ?>" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
<!-- END CONTENT -->
<div class="row-fluid">
    <div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
</div>

<?php include "footer.php" ?>