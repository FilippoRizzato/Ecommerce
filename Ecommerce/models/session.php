<?php

namespace models;
use PDO;

include_once dirname(__FILE__) . '/../DB/database.php';

class session
{
    private $id;
    private $ip;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function getDataLogin()
    {
        return $this->data_login;
    }

    public function setDataLogin($data_login)
    {
        $this->data_login = $data_login;
    }

    private $data_login;

    public static function Create($params)
    {
        $date = date('Y-m-d H:i:s');
        $database = new \DB\Database("localhost", "3307", "user", "123");
        $pdo = $database->connect("ecommerce");
        $stm = $pdo->prepare("insert into ecommerce.sessions(ip,data_login,user_id)values (:ip,:data_login,:user_id)");
        $stm->bindParam(":ip", $params["ip"]);
        $stm->bindParam(":data_login", $date);
        $stm->bindParam(":user_id", $params["user_id"]);
        $stm->execute();
    }


}
