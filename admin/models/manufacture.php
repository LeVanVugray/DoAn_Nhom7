<?php
class manufacture extends Db
{
    public function getAllmanufactures()
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getAuthorName()
    {
        $sql = self::$connection->prepare("SELECT manufactures.manu_name FROM products,manufactures 
        WHERE products.manu_id = manufactures.manu_id");
        // $sql->bind_param("i", $author);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

     // ham them 
     function addManu($id,$name,$image)
     {
         $sql = self::$connection->prepare("INSERT INTO `manufactures`(`manu_id`, `manu_name`, `image_manu`) 
         VALUES (?,?,?)");
         $sql->bind_param("iss",$id,$name, $image);
         return  $sql->execute();
     }

     //xoa
     public function DeleteManu($id)
     {
         $sql = self::$connection->prepare("DELETE FROM `manufactures`
          WHERE `manu_id`=?");
         $sql->bind_param("i", $id);
         return $sql->execute();
     }
    
     // hamf set cac item de update
    public function getManuById($id)
    {
        $sql = self::$connection->prepare('SELECT `manufactures`.`manu_id` , `products`.`image`, `manu_name` ,`manufactures`.`image_manu`
        FROM `manufactures` ,`products`
        WHERE `manufactures`.`manu_id` = ? ');
        $sql->bind_param("s", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

      // hamf update
    public function updateManuById($name, $image, $id)
    {
        if ($image != "") {
            $sql = self::$connection->prepare('UPDATE `manufactures` 
            SET `manu_name`=?,`img_manu`=?
             WHERE `manu_id`=?');
            $sql->bind_param("ssi", $name, $image, $id);
        } else {
            $sql = self::$connection->prepare('UPDATE `manufactures` 
            SET `manu_name`=?
             WHERE `manu_id`=?');
            $sql->bind_param("si", $name, $id);
        }
        $sql->execute();
    }

    public function getmanuByCate($page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT `manufactures`.`manu_id`,`manufactures`.`image_manu` , `products`.`image`, `manu_name` FROM manufactures ,products
        LIMIT ?,?");
        $sql->bind_param("ii", $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getmanuByName($page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT `manufactures`.`manu_id`,`manufactures`.`image_manu` , `manu_name` FROM manufactures
        LIMIT ?,?");
        $sql->bind_param("ii", $start, $count);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    function paginate_Manu($url, $total, $perPage)
    {
        $totalLinks = ceil($total / $perPage);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            $link = $link . "<a class='btn btn-sm btn-danger' style='background-color:rgb(46 54 63);border: 4px solid rgb(249 249 249);border-radius: 14px;' 
            href='$url&page=$j'> $j </a>";
        }
        return $link;
    }
}
