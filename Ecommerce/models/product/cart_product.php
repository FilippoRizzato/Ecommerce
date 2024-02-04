<?php

namespace models;

use database;

include_once dirname(__FILE__) . '/../../DB/database.php';

class cart_product
{
    private $id;
    private $product_id;
    private $nome;
    private $prezzo;
    private $marca;
    private $quantita;

    // Metodi Getter

    public static function create($cart, $product_id, $quantita)
    {
        $conn = database::getConnection();
        $stm = $conn->prepare("insert into cart_products (cart_id, product_id, quantita) VALUES (:cart_id, :product_id, :quantita)");
        $cart_id = $cart->getId();
        $stm->bindParam(":cart_id", $cart_id);
        $stm->bindParam(":product_id", $product_id);
        $stm->bindParam(":quantita", $quantita);
        $stm->execute();
    }

    public function getId()
    {
        return $this->id;
    }

    public static function delete($cart_id)
    {
        $conn = database::getConnection();
        $stm = $conn->prepare("DELETE FROM cart_products WHERE cart_id = :cart_id;");
        $stm->bindParam(":cart_id", $cart_id);
        $stm->execute();
    }


    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    // Metodi Setter

    public function getProduct_id()
    {
        return $this->product_id;
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

    public function getQuantita()
    {
        return $this->quantita;
    }

    public function setQuantita($quantita)
    {
        $this->quantita = $quantita;
    }
}