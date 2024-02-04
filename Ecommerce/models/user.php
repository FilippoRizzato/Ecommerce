<?php

namespace models;

use database;

include_once dirname(__FILE__) . '/../DB/database.php';

class user
{
    private $id;
    private $email;
    private $password;
    private $role_id;

    public static function find($email, $password)
    {
        $conn = database::getConnection();
        $stm = $conn->prepare("select * from users where email=:email and password=:password");
        $stm->bindParam(':email', $email);
        $stm->bindParam(':password', $password);
        $stm->execute();
        return $stm->fetchObject("\models\user");
    }

    public static function create($params)
    {
        $conn = database::getConnection();
        $stm = $conn->prepare("insert into users (email, password, role_id) VALUES (:email, :password, :role_id)");
        $stm->bindParam(':email', $email);
        $stm->bindParam(':password', $password);
        $stm->bindParam(':role_id', $role_id);
        $stm->execute();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getRole_id()
    {
        return $this->role_id;
    }

    public function setRole_id($role_id)
    {
        $this->role_id = $role_id;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}
