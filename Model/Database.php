<?php

namespace Model;

class Database
{
    private $host = "localhost";
    private $db_name = "ephone";
    private $username = "root";
    private $password = "";
    private $connetion = null;

    public function bddConnect()
    {
        try {
            $pdo = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            $this->connetion = $pdo;

        } catch (\PDOException $e) {
            exit ("Erreur de connetion  a la bdd: " . $e->getMessage());
        }

        return $this->connetion;
    }
}