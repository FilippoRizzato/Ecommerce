<?php

namespace models;

use database;

include_once dirname(__FILE__) . '/../DB/database.php';

class session
{
    private $id;
    private $ip;
    private $data_login;

    public static function create($ip, $user_id)
    {
        $data_login = date('Y-m-d H:i:s');
        $conn = database::getConnection();
        $stm = $conn->prepare("insert into sessions(ip,data_login,user_id)values (:ip,:data_login,:user_id)");
        $stm->bindParam(':ip', $ip);
        $stm->bindParam(':data_login', $data_login);
        $stm->bindParam(':user_id', $user_id);
        $stm->execute();
    }

    public function getId()
    {
        return $this->id;
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


}
