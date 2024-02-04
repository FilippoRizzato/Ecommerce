<?php

class Database
{
    /**
     * @var PDO
     */
    public static $conn;

    public static function getConnection()
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
}

