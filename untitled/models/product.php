<?php

namespace models;

require_once "../database.php";

class Product
{
    private $id;
    private $nome;
    private $prezzo;
    private $marca;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getPrezzo()
    {
        return $this->prezzo;
    }

    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;
    }

    public function getmarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public static function Create($params)
    {
        $database = new \Database("localhost", "3307", "user", "password");
        $pdo = $database->connect("ecommerce");
        $stm = $pdo->prepare("INSERT INTO ecommerce.products(nome, prezzo, marca) VALUES (:nome, :prezzo, :marca)");
        $stm->bindParam(":nome", $params["nome"]);
        $stm->bindParam(":prezzo", $params["prezzo"]);
        $stm->bindParam(":marca", $params["marca"]);
        $stm->execute();
    }
    public static function getAllProducts()
    {
        $database = new \Database("localhost", "3306", "username", "password");
        $pdo = $database->connect("ecommerce");

        $stmt = $pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');
    }
}

