<?php
namespace Model\Repository;

use Model\Entity\Marque;
use Service\Session;

class MarqueRepository extends BaseRepository{


    // public function getMarque(){
    //     try{
    //         $resultat = $this->dbConnection->prepare("SELECT * FROM marque INNER JOIN telephone ON marque.id = telephone.fk_marque");
    //         $resultat->execute();
    //         $marque = $resultat -> fetchAll(\PDO::FETCH_CLASS, "Model\Entity\Marque");
    //         return $marque;
    //     }catch (PDOException $e) {
    //         die("Erreur lors de la recuperation des donnees de la marque : " . $e->getMessage());
    //     }

    
// }

public function addMarque(Marque $marque){
    try{
        $requete = $this->dbConnection->prepare("INSERT INTO marque (nomMarque, image, created_at) VALUES (:nomMarque, :image, NOW())");
        $requete->bindValue(':nomMarque', $marque->getNomMarque(), \PDO::PARAM_STR);
        $requete->bindValue(':image', $marque->getImage(), \PDO::PARAM_STR);
        $requete->execute();
        return true;
    }catch (PDOException $e) {
        die("Erreur lors de l'insertion de la marque: ". $e->getMessage());
    }
}

public function udapteMarque(Marque $marque){
    try{
        $requete = $this->dbConnection->prepare("UPDATE marque SET nomMarque = :nomMarque WHERE id = :id");
        $requete->bindValue(':nomMarque', $marque->getNomMarque(), \PDO::PARAM_STR);
        $requete->bindValue(':id', $marque->getId(), \PDO::PARAM_INT);
        $requete->execute();
        return true;
    }catch (PDOException $e) {
        die("Erreur lors de la modification de la marque: ". $e->getMessage());
    }

}
    
}