<?php

namespace models\product;

include_once dirname(__FILE__) . '/../../DB/database.php';
use PDO;
class CartProduct
{
    private $id;
    private $cart_id;
    private $user_id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCartId()
    {
        return $this->cart_id;
    }

    public function setCartId($cart_id)
    {
        $this->cart_id = $cart_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
}




