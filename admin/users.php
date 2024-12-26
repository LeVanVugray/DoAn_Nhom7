<?php
include "header.php";
include "sidebar.php";
?>
<?php
$cate = 1;
// // hiển thị 5 sản phẩm trên 1 trang
$perpage = 2;
// // Lấy số trang trên thanh địa chỉ
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// $page = 1;
// // Tính tổng số dòng, ví dụ kết quả là 18
$total = count($Users->getAllUser());
// $total = count($products->getAllItemByCate($cate));
// // lấy đường dẫn đến file hiện hành
$urll = $_SERVER['PHP_SELF']. "?cate=" . $cate;

?>
<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> <a href="form_Add_User.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
        <h1>Manage User</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"><a href="form_Add_User.php"> <i class="icon-plus"></i>
                            </a></span>
                        <h5>Products</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered
                                    table-striped">
                            <thead>
                                <tr>
                                    <th>User Id</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $getAllUser = $Users->getAllUser();
                                    $getUsersByCatea = $Users->getUserByCate(0,$page,$perpage);
                                    // var_dump($getUsersByCatea);
                                    // var_dump($getAllUser);
                                    foreach($getUsersByCatea as $value):
                                ?>
                                <tr class="">
                                    <td><?php echo $value['User_Id'] ?></td>
                                    <td><?php echo $value['Username'] ?></td>
                                    <td><?php echo md5($value['Password']) ?></td>
                                    <td><?php echo $value['Role'] ?></td>
                                    <td>
                                        <a href="form_Update_User.php?id=<?php echo $value ['User_Id']?>" class="btn
                                                    btn-success btn-mini">Edit</a>
                                       <a href="deleteUser.php?id=<?php echo $value['User_Id']?>" class="btn
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
                                <?php echo $Users->paginate($urll, $total, $perpage); ?>
                            </ul>
                        </div>
            </div>
        </div>
    </div>
</div>
<!-- END CONTENT -->
<?php include "footer.php" ?>