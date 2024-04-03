<?php
namespace Model\Repository;

use Model\Entity\Panier;
use Service\Session;

class PanierRepository extends BaseRepository{

    public function addPanier($utilisateurId) {
        $panier = new Panier;
        $panier->setFk_UtilisateurPanier($utilisateurId);
        try{
            $requete = $this->dbConnection->prepare("INSERT INTO `panier` (`fk_UtilisateurPanier`) VALUES (:fk_UtilisateurPanier)");
            $requete->bindValue(":fk_UtilisateurPanier", $panier->getFk_UtilisateurPanier(), PDO::PARAM_INT);
            $requete->execute();
        }catch(PDOException $e) {
            die("Erreur lors de l'ajout du panier: " . $e->getMessage()); 
        }
        
    }
    
}