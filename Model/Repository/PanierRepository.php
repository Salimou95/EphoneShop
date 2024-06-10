<?php
namespace Model\Repository;

use Model\Entity\Panier;
use Service\Session;

class PanierRepository extends BaseRepository{

    public function createPanier($utilisateurId) {
        try{
            $request = $this->dbConnection->prepare("INSERT INTO `panier` (`fk_UtilisateurPanier`) VALUES (:fk_UtilisateurPanier)");
            $request->bindValue(":fk_UtilisateurPanier", $utilisateurId, \PDO::PARAM_INT);
            $request->execute();
        }catch(PDOException $e) {
            exit("Erreur lors de l'ajout du panier: " . $e->getMessage()); 
        }
        
    }

    public function udaptePanier(Panier $panier, $qtpanier) {
        try{
            $panier->setFk_UtilisateurPanier($_SESSION["user"]->getId());
            $request = $this->bdd->prepare("UPDATE `panier` SET `quantitePanier` = :qtpanier WHERE `panier`.`fk_UtilisateurPanier` = :fk_UtilisateurPanier;");
            $request->bindParam(":qtpanier", $qtpanier);
            $request->bindParam(":fk_UtilisateurPanier", $panier->getFk_UtilisateurPanier());
            $request->execute();
        }catch(PDOException $e) {
            exit("Erreur lors de l'ajout du panier: " . $e->getMessage()); 
        }
    }




    
}