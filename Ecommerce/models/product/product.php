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
        $database = new \DB\Database("localhost", "3307", "user", "123");
        $pdo = $database->connect("ecommerce");
        $stm = $pdo->prepare("INSERT INTO ecommerce.products(nome, prezzo, marca) VALUES (:nome, :prezzo, :marca)");
        $stm->bindParam(":nome", $params["nome"]);
        $stm->bindParam(":prezzo", $params["prezzo"]);
        $stm->bindParam(":marca", $params["marca"]);
        $stm->execute();
    }
    public static function getAllProducts()
    {
        $database = new \DB\Database("localhost", "3307", "user", "123");
        $pdo = $database->connect("ecommerce");

        $stmt = $pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function getProductById($id) {
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            return new Product($product['id'], $product['nome'], $product['prezzo'], $product['marca']);
        } else {
            return null;
        }
    }

    public function update() {
        global $conn;

        $stmt = $conn->prepare("UPDATE product SET nome = :nome, prezzo = :prezzo, marca = :marca WHERE id = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':prezzo', $this->prezzo);
        $stmt->bindParam(':marca', $this->marca);

        $stmt->execute();
    }
}

