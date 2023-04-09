<?php
class Db
{

    public $sql;

    public function db_connect($sql)
    {
        try {
            $db = new PDO('mysql:dbname=memo_sample001_db;host=localhost;charset=utf8', 'root', 'root');
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm = $db->prepare($sql);
            $stm->execute();
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo 'DB接続エラー！: ' . $e->getMessage();
        }
    }
}
