<?php

namespace models;
use database;

include_once dirname(__FILE__) . '/../DB/database.php';


class cart
{
    private $id;
    private $used_id;

    public static function find($id)
    {
        $conn = database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM carts WHERE user_id = :user_id");
        $user_id = $id;
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $cart = $stmt->fetchObject('models\cart');
        return $cart;
    }

    // Metodo setter per $id

    public static function create_cart($user_id)
    {
        $conn = database::getConnection();
        $stm = $conn->prepare("insert into carts (user_id) VALUES (:user_id)");
        $stm->bindParam(":user_id", $user_id);
        $stm->execute();
    }

    // Metodo getter per $used_id

    public function getId()
    {
        return $this->id;
    }

    // Metodo setter per $used_id

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsedId()
    {
        return $this->used_id;
    }

    public function setUsedId($used_id)
    {
        $this->used_id = $used_id;
    }


}

