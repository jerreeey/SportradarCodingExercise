<?php

class db
{

    private $db;
    function __construct(){

        try {

            $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PW);

        }catch(PDOException $e){
            echo "Verbindung fehlgeschlagen";
            die();
        }

    }

    /**
     * @return PDO
     */
    public function getDb()
    {
        return $this->db;
    }

    public function getAll($tabelle){

        $stmt= $this->db->prepare("SELECT * FROM $tabelle");
        $stmt ->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }



}