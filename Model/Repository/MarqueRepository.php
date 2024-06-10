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
    //         exit("Erreur lors de la recuperation des donnees de la marque : " . $e->getMessage());
    //     }

    
// }

public function addMarque(Marque $marque){
    try{
        $request = $this->dbConnection->prepare("INSERT INTO marque (nomMarque, image, created_at) VALUES (:nomMarque, :image, NOW())");
        $request->bindValue(':nomMarque', $marque->getNomMarque(), \PDO::PARAM_STR);
        $request->bindValue(':image', $marque->getImage(), \PDO::PARAM_STR);
        $request->execute();
        return true;
    }catch (PDOException $e) {
        exit("Erreur lors de l'insertion de la marque: ". $e->getMessage());
    }
}

public function udapteMarque(Marque $marque){
    try{
        $request = $this->dbConnection->prepare("UPDATE marque SET nomMarque = :nomMarque WHERE id = :id");
        $request->bindValue(':nomMarque', $marque->getNomMarque(), \PDO::PARAM_STR);
        $request->bindValue(':id', $marque->getId(), \PDO::PARAM_INT);
        $request->execute();
        return true;
    }catch (PDOException $e) {
        exit("Erreur lors de la modification de la marque: ". $e->getMessage());
    }

}
    
}