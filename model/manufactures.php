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
    public function getcateNamemanufactures($cate)
    {
        $sql = self::$connection->prepare("SELECT * FROM manufactures  WHERE `manu_id`=?");
        $sql->bind_param("i", $cate);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
}