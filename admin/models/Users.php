<?php
class User extends Db{
    public function getAllUser(){
    $sql = self:: $connection->prepare("SELECT * fROM users");
        $sql->execute();
        $items=array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getUserByCate($cate_id,$page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM users 
        WHERE `ALL` = ? 
        LIMIT ?,?");
        $sql->bind_param("iii", $cate_id, $start, $count);
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

            $link = $link . "<a class='btn btn-sm btn-danger' style='background-color:rgb(46 54 63);border: 4px solid rgb(249 249 249);border-radius: 14px;'  
            href='$url&page=$j'> $j </a>";
        }
        return $link;
    }
     // ham them 
     function addUser($name,$pass,$role,$all)
     {
         $sql = self::$connection->prepare('INSERT INTO `users`(`Username`, `Password`, `Role`, `ALL`) 
         VALUES (?,?,?,?)');
         $sql->bind_param("sssi",$name,$pass,$role,$all);
         return  $sql->execute();
     }

     //xoa
     public function DeleteUser($id)
     {
         $sql = self::$connection->prepare("DELETE FROM `users`
          WHERE `User_Id`=?");
         $sql->bind_param("i", $id);
         return $sql->execute();
     }
    
     // hamf set cac item de update
    public function getUserById($id)
    {
        $sql = self::$connection->prepare('SELECT * FROM `users` 
        WHERE `User_Id` = ? ');
        $sql->bind_param("s", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

      // hamf update
    public function updateUserById($name,$pass,$role,$all,$id)
    {
        if ($pass != "") {
            $sql = self::$connection->prepare('UPDATE `users`
             SET`Username`=?,`Password`=?,`Role`=?,`ALL`=? 
            WHERE User_Id = ?');
            $sql->bind_param("sssii", $name,$pass,$role,$all,$id);
        } else {
            $sql = self::$connection->prepare('UPDATE `users`
             SET`Username`=?,`Role`=?,`ALL`=? 
            WHERE User_Id = ?');
            $sql->bind_param("ssii", $name,$role,$all,$id);
        }
        $sql->execute();
    }
}