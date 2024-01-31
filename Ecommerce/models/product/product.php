<?php

namespace models\product;

use PDO;
use PDOException;

include_once dirname(__FILE__) . '/../../DB/database.php';

class Product
{
    private static $conn;
    private $id;
    private $nome;
    private $prezzo;
    private $marca;

    // Metodi getter e setter...

    public static function Create($params)
    {
        $database = new \DB\Database("localhost", "3307", "user", "123");
        $pdo = $database->connect("ecommerce");

        $nome = isset($params["nome"]) ? $params["nome"] : '';
        $prezzo = isset($params["prezzo"]) ? $params["prezzo"] : 0.0;
        $marca = isset($params["marca"]) ? $params["marca"] : '';

        $stm = $pdo->prepare("INSERT INTO ecommerce.products(nome, prezzo, marca) VALUES (:nome, :prezzo, :marca)");
        $stm->bindParam(":nome", $nome);
        $stm->bindParam(":prezzo", $prezzo);
        $stm->bindParam(":marca", $marca);
        $stm->execute();
    }

    public static function getAllProducts()
    {
        $database = new \DB\Database("localhost", "3307", "user", "123");
        $pdo = $database->connect("ecommerce");

        $stmt = $pdo->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private static function getConnection()
    {
        if (!self::$conn) {
            $host = 'localhost';
            $port = '3307';
            $dbname = 'ecommerce';
            $username = 'user';
            $password = '123';

            try {
                self::$conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        return self::$conn;
    }

    public static function getProductById($id)
    {
        $conn = self::getConnection();

        $stmt = $conn->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            $instance = new self();
            $instance->setId($product['id']);
            $instance->setNome($product['nome']);
            $instance->setPrezzo($product['prezzo']);
            $instance->setMarca($product['marca']);
            return $instance;
        } else {
            return null;
        }
    }

    public function update()
    {
        $conn = self::getConnection();

        $stmt = $conn->prepare("UPDATE products SET nome = :nome, prezzo = :prezzo, marca = :marca WHERE id = :id");
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':prezzo', $this->prezzo);
        $stmt->bindParam(':marca', $this->marca);

        $stmt->execute();
    }

    private function setId($id)
    {
    }

    public function setNome($nome)
    {
    }

    public function setPrezzo($prezzo)
    {
    }

    public function setMarca($marca)
    {
    }

    public function getNome()
    {
    }

    public function getPrezzo()
    {
    }

    public function getMarca()
    {
    }
}


