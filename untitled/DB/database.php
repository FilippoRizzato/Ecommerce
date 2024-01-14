<?php

namespace DB;
use PDO;
use PDOException;

class Database
{
    private $host, $port, $username, $password;

    public function __construct($host, $port, $username, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect($dbname)
    {
        $dsn = "mysql:dbname={$dbname};host={$this->host};port={$this->port}";

        try {
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Abilita le eccezioni PDO
            return $pdo;
        } catch (PDOException $e) {

            die('Connessione al database fallita: ' . $e->getMessage());
        }
    }
}
