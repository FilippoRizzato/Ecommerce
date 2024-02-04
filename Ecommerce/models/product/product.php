<?php

namespace models\product;

use PDO;

include_once dirname(__FILE__) . '/../../DB/database.php';

class Product
{
    private $id;
    private $nome;
    private $prezzo;
    private $marca;


    public static function create($nome, $marca, $prezzo)
    {
        $conn = \database::getConnection();
        $stm = $conn->prepare("insert into products (nome, marca, prezzo) VALUES ( :nome, :marca, :prezzo)");
        $stm->bindParam(":nome", $nome);
        $stm->bindParam(":prezzo", $prezzo);
        $stm->bindParam(":marca", $marca);
        $stm->execute();

        $id = $conn->lastInsertId();
        return self::getProductById($id);
    }

    public static function getProductById($id)
    {
        $conn = \database::getConnection();

        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $product = $stmt->fetchObject(__CLASS__);
        return $product;
    }

    public static function getAllProducts()
    {
        $conn = \database::getConnection();

        $stmt = $conn->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $conn = \database::getConnection();
        $stm = $conn->prepare("DELETE FROM products WHERE id = :id;");
        $stm->bindParam(":id", $id);
        $stm->execute();
        $product = self::getProductById($id);
        return $product;
    }

    public function update($id, $nome, $marca, $prezzo)
    {
        $conn = \database::getConnection();
        $stm = $conn->prepare("
                UPDATE products
                SET nome = :nome, prezzo = :prezzo, marca = :marca
                WHERE id = :id;
        ");
        $stm->bindParam(":nome", $nome);
        $stm->bindParam(":prezzo", $prezzo);
        $stm->bindParam(":marca", $marca);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $product = self::getProductById($id);
        return $product;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrezzo()
    {
        return $this->prezzo;
    }

    public function setPrezzo($prezzo)
    {
        $this->prezzo = $prezzo;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }
}


