<?php

namespace models;
use PDO;

include_once dirname(__FILE__) . '/../DB/database.php';

class Cart
{
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

}

