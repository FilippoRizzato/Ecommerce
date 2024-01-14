<?php

namespace models;
use DateTime;
use DB\Database;
use PDO;
use PDOException;

include_once dirname(__FILE__) . '/../DB/database.php';

class user
{
    private $id;

    private static function getPdo()
    {
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    private $email;
    private $password;

    public static function Find($id)

    {
        $database = new database("localhost", "3307", "user", "password");
        $pdo = $database->connect("ecommerce");
        $stm = $pdo->prepare("select * from ecommerce.sessions where id=:id");
        $stm->bindParam("id", $id);
        if ($stm->execute()) {
            return $stm->fetchObject("session");
        } else {
            throw new PDOException("Errore nella find");
        }
    }
    public static function Create($dati) {
        $query = self::getPdo()->prepare(
            "INSERT INTO ecommerce.user(email, password, role_id) VALUES (:email, :password, :role_id)"
        )->execute([
            "email" => $dati["email"],
            "password" => $dati["password"],
            "role_id" => $dati["role_id"],


        ]);
        $obj = $query->fetchObject(__CLASS__);
        $obj->data = new Datetime($obj->data);
        return $obj;
    }
}
