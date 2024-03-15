<?php
namespace Model\Repository;

use Model\Entity\Marque;
use Service\Session;

class MarqueRepository extends BaseRepository{


    public function getMarque(){
        try{
            $resultat = $this->dbConnection->prepare("SELECT * FROM marque");
            $resultat->execute();
            $marque = $resultat -> fetchAll(\PDO::FETCH_CLASS, "Model\Entity\Marque");
            return $marque;
        }catch (PDOException $e) {
            die("Erreur lors de l'insertion : " . $e->getMessage());
        }

    
}

    
}