<?php
class products extends Db
{
    public function getAllItems()
    {
        $sql = self::$connection->prepare("SELECT * FROM products");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllItemCount()
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) AS SoLuong FROM `products` WHERE `ALL`=1;");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllItemSUM()
    {
        $sql = self::$connection->prepare("SELECT SUM(`Total`) AS Tong FROM `products` WHERE `ALL`=1");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemByIdheartshop($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products  WHERE `ALL`=1 AND id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemByIddetail($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE  id = ?");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemByIdshop($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `ALL`=1 AND id = ? ");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemByIdheart($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = ? ");
        $sql->bind_param("i", $id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemAllshop()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `ALL`=1");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemAllheart()
    {
        $sql = self::$connection->prepare("SELECT *  FROM `products` WHERE `heart`=1");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemAllheartcount()
    {
        $sql = self::$connection->prepare("SELECT COUNT(*) AS SoLuong  FROM `products` WHERE `heart`=1");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getNewItem($start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `ALL`=0  ORDER BY id DESC 
        LIMIT ?,?");
        $sql->bind_param("ii", $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getFeatureNewItem($start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `feature` = 1 ORDER BY `feature` DESC 
        LIMIT ?,?");
        $sql->bind_param("ii", $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getItemByCat($category)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE manu_id = ?");
        $sql->bind_param("i", $category);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getCatNameById($category)
    {
        $sql = self::$connection->prepare("SELECT manufactures.manu_name FROM products,manufactures 
        WHERE products.id = manufactures.manu_id
        AND id = ?");
        $sql->bind_param("i", $category);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    // chưa đụng tới
    public function getCatNameByprotypes()
    {
        $sql = self::$connection->prepare("SELECT protypes.type_name FROM products,protypes 
        WHERE products.type_id = protypes.type_id
        ");
        // $sql->bind_param("i", $category);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    //// chưa cần sài
    // public function getAuthorName($author)
    // {
    //     $sql = self::$connection->prepare("SELECT author.name FROM items,author 
    //     WHERE items.author = author.id
    //     AND author = ?");
    //     $sql->bind_param("i", $author);
    //     $sql->execute(); //return an object
    //     $items = array();
    //     $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    //     return $items; //return an array
    // }
    public function search($keyword, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM products 
        WHERE `ALL`=0 AND `name` 
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
    // chưa test
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
    public function getItemByCate($cate_id, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM products 
        WHERE manu_id = ? 
        LIMIT ?,?");
        $sql->bind_param("iii", $cate_id, $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAllBestSelling($start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE `BestSellingProducts` = 1 ORDER BY `BestSellingProducts` DESC 
        LIMIT ?,?");
        $sql->bind_param("ii", $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function paginate($url, $total, $perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            $link = $link . "<a class='badge badge-primary text-uppercase font-weight-semi-bold p-2 mr-2' 
            href='$url&page=$j'> $j </a>";
        }
        return $link;
    }
    public function ADD($name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `products`(`name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `Quantity`, `BestSellingProducts`, `PriceDiscount`, `ALL`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("siiissiiiii", $name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL);
        return $sql->execute();
    }
    public function Delete($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `id`=?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    public function Update($name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total, $id)
    {
        if ($image != "") {
            $sql = self::$connection->prepare("UPDATE `products` 
        SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`image`=?,`description`=?,`feature`=?,`Quantity`=?,`BestSellingProducts`=?,`PriceDiscount`=?,`ALL`=? ,`Quantilyshop`=? ,`Total`=?
        WHERE `id` = ?");
            $sql->bind_param("siiissiiiiiiii", $name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total, $id);
        } else {
            $sql = self::$connection->prepare("UPDATE `products` 
        SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`description`=?,`feature`=?,`Quantity`=?,`BestSellingProducts`=?,`PriceDiscount`=?,`ALL`=? ,`Quantilyshop`=?,`Total`=?
        WHERE `id` = ?");
            $sql->bind_param("siiisiiiiiiii", $name, $manu_id, $type_id, $price, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total, $id);
        }
        return $sql->execute();
    }
    public function ADDdetail($name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `products`(`name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `Quantity`, `BestSellingProducts`, `PriceDiscount`, `ALL`,`Quantilyshop`,`Total`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("siiissiiiiiii", $name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total);
        return $sql->execute();
    }
    public function Updatedetail($name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total, $id)
    {
        if ($image != "") {
            $sql = self::$connection->prepare("UPDATE `products` 
        SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`image`=?,`description`=?,`feature`=?,`Quantity`=?,`BestSellingProducts`=?,`PriceDiscount`=?,`ALL`=? ,`Quantilyshop`=? ,`Total`=?
        WHERE `ALL`= 0 AND `id` = ?");
            $sql->bind_param("siiissiiiiiiii", $name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total, $id);
        } else {
            $sql = self::$connection->prepare("UPDATE `products` 
        SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`description`=?,`feature`=?,`Quantity`=?,`BestSellingProducts`=?,`PriceDiscount`=?,`ALL`=? ,`Quantilyshop`=?,`Total`=?
        WHERE `ALL`= 0 AND `id` = ?");
            $sql->bind_param("siiisiiiiiiii", $name, $manu_id, $type_id, $price, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total, $id);
        }
        return $sql->execute();
    }
    public function ADDheart($name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total, $heart)
    {
        $sql = self::$connection->prepare("INSERT 
        INTO `products`(`name`, `manu_id`, `type_id`, `price`, `image`, `description`, `feature`, `Quantity`, `BestSellingProducts`, `PriceDiscount`, `ALL`,`Quantilyshop`,`Total`,`heart`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("siiissiiiiiiii", $name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total, $heart);
        return $sql->execute();
    }
    public function Updateheart($name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total, $heart, $id)
    {
        if ($image != "") {
            $sql = self::$connection->prepare("UPDATE `products` 
        SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`image`=?,`description`=?,`feature`=?,`Quantity`=?,`BestSellingProducts`=?,`PriceDiscount`=?,`ALL`=? ,`Quantilyshop`=? ,`Total`=?,`heart`=?
        WHERE `id` = ?");
            $sql->bind_param("siiissiiiiiiiii", $name, $manu_id, $type_id, $price, $image, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total, $heart, $id);
        } else {
            $sql = self::$connection->prepare("UPDATE `products` 
        SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`description`=?,`feature`=?,`Quantity`=?,`BestSellingProducts`=?,`PriceDiscount`=?,`ALL`=? ,`Quantilyshop`=?,`Total`=?,`heart`=?
        WHERE `id` = ?");
            $sql->bind_param("siiisiiiiiiiiii", $name, $manu_id, $type_id, $price, $description, $feature, $Quantity, $BestSellingProducts, $PriceDiscount, $ALL, $Quantityshop, $Total, $heart, $id);
        }
        return $sql->execute();
    }
}
