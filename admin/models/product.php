<?php
class Product extends Db
{
    //Viet phuong thuc lay ra tat ca san pham moi nhat
    // function getAllProducts(){
    //     $sql = self::$connection->prepare("SELECT * 
    //     FROM products,manufactures,protypes 
    //     WHERE products.manu_id = manufactures.manu_id
    //     AND products.type_id = protypes.type_id
    //     ORDER BY id DESC
    //     LIMIT 0,10");
    //     $sql->execute();//return an object
    //     $items = array();
    //     $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    //     return $items; //return an array
    // }
    public function getAllItem()
    {
        $sql = self::$connection->prepare("SELECT * fROM `products` WHERE `ALL`=0
        ORDER BY `created_at` Desc");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getallnameimage()
    {
        $sql = self::$connection->prepare("SELECT `manufactures`.`manu_id` , `products`.`image`, `manu_name` FROM `manufactures`,`products` 
        WHERE `manufactures`.`manu_id`= `products`.`manu_id`");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function search($keyword, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM products 
        WHERE `name` 
        LIKE ? 
        LIMIT ?,?");
        $keyword = "%$keyword%";
        $sql->bind_param("sii", $keyword, $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function searchAll($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM products 
        WHERE `name` 
        LIKE ?");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute(); //return an object
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function paginate($url, $total, $perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            $link = $link . "<a class='btn btn-sm btn-danger' style='background-color:rgb(46 54 63);border: 4px solid rgb(249 249 249);border-radius: 14px;' 
            href='$url&page=$j'> $j </a>";
        }
        return $link;
    }
    public function getAllItemByCate($cate_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products 
        WHERE manu_id=? ");
        // $keyword = "%$keyword%";
        $sql->bind_param("i", $cate_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllItemByCateid($cate_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products 
        WHERE id=? ");
        // $keyword = "%$keyword%";
        $sql->bind_param("i", $cate_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAuthorName()
    {
        $sql = self::$connection->prepare("SELECT `id`, `name`,`manufactures`.`manu_name` , `type_id`, `price`, `image`, `description`, `feature`, `created_at`, `Quantity`, `BestSellingProducts`, `PriceDiscount`, `ALL` FROM `products` , `manufactures`");
        // $sql->bind_param("i", $author);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemByCate($cate_id, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM products 
        WHERE `ALL` = ? 
        ORDER BY `id` DESC LIMIT ?,? ");
        $sql->bind_param("iii", $cate_id, $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function Delete($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `id`=?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    public function ADD($name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `products`(`name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `Quantity`, `BestSellingProducts`, `PriceDiscount`, `ALL`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("siiissiiiii", $name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL);
        return $sql->execute();
    }
    public function Update($name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $id)
    {
        if ($image != "") {
            $sql = self::$connection->prepare("UPDATE `products` 
        SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`image`=?,`description`=?,`feature`=?,`Quantity`=?,`BestSellingProducts`=?,`PriceDiscount`=?,`ALL`=? 
        WHERE `id` = ?");
            $sql->bind_param("siiissiiiiii", $name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $id);
        } else {
            $sql = self::$connection->prepare("UPDATE `products` 
        SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`description`=?,`feature`=?,`Quantity`=?,`BestSellingProducts`=?,`PriceDiscount`=?,`ALL`=? 
        WHERE `id` = ?");
            $sql->bind_param("siiisiiiiii", $name, $manu_id, $type_id, $price, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $id);
        }
        return $sql->execute();
    }

    // chưa cần sài
}
