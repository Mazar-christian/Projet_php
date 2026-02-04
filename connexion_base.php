<?php

class Connexion_base{
    private $host="localhost";
    private $db_name="gest_sportive";
    private $username="root";
    private $password="Ata@1est";
    private $charset="UTF-8";
    public $connection;
    // fonction pour obtenir la connection
    public function getconnexion(){
        $this->connection = null;
        try{
            $db=('mysql:host='.$this->host.'db_name='.$this->db_name.'charset='.$this->charset);
            
            // options
            $OPTIONS = [
                PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO:: ATTR_EMULATE_PREPARES =>false,
            ];

            $this->connection = new PDO($db,$this->username.$this->password,$OPTIONS);
        }
        catch(PDOException  $exception ){
            echo'Erreur de connexion'.$exception->getMessage();
        }
        return $this->connection;
    }
    
}