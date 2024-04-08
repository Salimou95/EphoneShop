<?php
namespace Model\Repository;

use Model\Entity\Panier;
use Service\Session;

class PanierRepository extends BaseRepository{

    public function createPanier($utilisateurId) {
        try{
            $requete = $this->dbConnection->prepare("INSERT INTO `panier` (`fk_UtilisateurPanier`) VALUES (:fk_UtilisateurPanier)");
            $requete->bindValue(":fk_UtilisateurPanier", $utilisateurId, \PDO::PARAM_INT);
            $requete->execute();
        }catch(PDOException $e) {
            die("Erreur lors de l'ajout du panier: " . $e->getMessage()); 
        }
        
    }

    public function udaptePanier(Panier $panier, $qtpanier) {
        try{
            $panier->setFk_UtilisateurPanier($_SESSION["user"]->getId());
            $requete = $this->bdd->prepare("UPDATE `panier` SET `quantitePanier` = :qtpanier WHERE `panier`.`fk_UtilisateurPanier` = :fk_UtilisateurPanier;");
            $requete->bindParam(":qtpanier", $qtpanier);
            $requete->bindParam(":fk_UtilisateurPanier", $panier->getFk_UtilisateurPanier());
            $requete->execute();
        }catch(PDOException $e) {
            die("Erreur lors de l'ajout du panier: " . $e->getMessage()); 
        }
    }




    
}