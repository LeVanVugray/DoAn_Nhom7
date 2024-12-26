<?php
class Users extends Db{
    public function getAllItems()
    {
        $sql = self::$connection->prepare("SELECT * FROM users");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function ADD($name,$pass)
    {
        $sql = self::$connection->prepare("INSERT INTO `users`(`Username`, `Password`) 
        VALUES (?,?)");
        $sql->bind_param("si", $name, $pass);
        return $sql->execute();
    }
    public function Updatepassword($Password,$id)
    {
        $sql = self::$connection->prepare("UPDATE `users` SET `Password`=? WHERE `User_Id`=?");
        $sql->bind_param("ii", $Password, $id);
        return $sql->execute();
    }
}