<?php
include "header.php";
include "sidebar.php";
if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    // var_dump($keyword);
    // hiển thị 5 sản phẩm trên 1 trang
    $searchcount = $products->searchAll($keyword);
    $count = 3;
    $perpage = 3;
    // // Lấy số trang trên thanh địa chỉ
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    // var_dump($page);
    // // Tính tổng số dòng, ví dụ kết quả là 18
    $total = count($searchcount);
    // $total = 3;
    // // lấy đường dẫn đến file hiện hành
    $url = $_SERVER['PHP_SELF'] . "?keyword=" . $keyword;
    // $search = $products->search($keyword, $page, $perpage);
    $searchAll = $products->searchAll($keyword);
    // var_dump($searchAll);
}
?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h6>Result: found 10 item(s) with keyword "<?php echo $keyword ?>"</h6>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="form.html"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Products</h5>
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
                                    $search = $products->search($keyword, $page, $perpage);
                                    foreach($search as $value):
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
                                        <a href="#45" class="btn
                                                    btn-success btn-mini">Edit</a>
                                        <a href="#45" class="btn
                                                    btn-danger btn-mini">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?> 
                                
                            </tbody>
                        </table>
                        <div class="row" style="margin-left: 18px;">
                            <ul class="pagination">
                                <!-- <li class="active"><a href="">1</a>
                                </li>
                                <li><a href="">2</a></li>
                                <li><a href="">3</a></li>
                                 -->
                                 <?php echo $products->paginate($url, $total, $perpage) ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>