<?php

class Database
{
    static private $instantiate = null;
    private $connexionbdd;
    private $host = "localhost";
    private $dbname = "e-gnose";
    private $user = "root";
    private $pass = "root";

    // Paramètre de connexion à la base
    private function __construct()
    {
        try {
            $this->connexionbdd = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        } catch (PDOException $e) {
            echo "erreur de connexion à la base de donnée";
        }
    }

    public function __clone()
    {
        trigger_error("Le clonage n'est pas autorisée", E_USER_ERROR);
    }
    
    // Permet d'instancier la connexion à la BDD
    public static function getInstance()
    {
        //Si pas instancié alors on l'instancie
        if (!isset(self::$instantiate)) {
            self::$instantiate = new Database();
        }
        return self::$instantiate;
    }
    public function getConnexion(){
        return $this->connexionbdd;
    }
}
// Vérifie si une connexion existe déjà
$database = Database::getInstance();
// connexion
$db = $database->getConnexion();
