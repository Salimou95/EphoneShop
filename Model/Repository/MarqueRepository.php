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

public function addMarque(Marque $marque){
    try{
        $resultat = $this->dbConnection->prepare("INSERT INTO marque (nomMarque, image, created_at) VALUES (:nomMarque, :image, NOW())");
        $resultat->bindValue(':nomMarque', $marque->getNomMarque());
        $resultat->bindValue(':logoMarque', $marque->getImage());
        $resultat->execute();
        return true;
    }catch (PDOException $e) {
        die("Erreur lors de l'insertion : ". $e->getMessage());
    }
}
    
}