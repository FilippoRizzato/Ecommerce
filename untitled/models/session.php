<?php

namespace models;


require_once "../database.php";

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
        $database = new \Database("192.168.1.5", "3306", "cristiano", "password");
        $pdo = $database->connect("ecommerce5E");
        $stm = $pdo->prepare("insert into ecommerce.sessions(ip,data_login,user_id)values (:ip,:data_login,:user_id)");
        $stm->bindParam(":ip", $params["ip"]);
        $stm->bindParam(":data_login", $date);
        $stm->bindParam(":user_id", $params["user_id"]);
        $stm->execute();
    }


}
