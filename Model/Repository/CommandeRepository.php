<?php
namespace Model\Repository;

use Model\Entity\Commande;
use Model\Entity\Utilisateur;

class CommandeRepository extends BaseRepository{

    public function createCommande(Commande $commande){
        try{
            $commande->setFk_UtilisateurCommande($_SESSION["user"]->getId());
            $this->dbConnection->beginTransaction();
            $request = $this->dbConnection->prepare("INSERT INTO `commande` (`statut`, `dateLivraison`, `prix`, `fkUtilisateurCommande`,`created_at`) VALUES (:statut, :dateLivraison, :prix, :fk_UtilisateurCommande, NOW())");
            $request->bindValue(":statut", $commande->getStatut(), \PDO::PARAM_STR);
            $request->bindValue(":dateLivraison", $commande->getDateLivraison());
            $request->bindValue(":prix",$commande->getPrix(),  \PDO::PARAM_INT);
            $request->bindValue(":fk_UtilisateurCommande", $commande->getFk_UtilisateurCommande(),  \PDO::PARAM_INT);
            $request->execute();
            $idCommande = $this->dbConnection->lastInsertId();
            $this->dbConnection->commit();
            return $idCommande;

        }catch(PDOException $e) {
            exit("Erreur lors de la creation de la commande: " . $e->getMessage());
        }
    
    }

    public function updateCommande(Commande $commande)
    {

        $request = $this->dbConnection->prepare("UPDATE commande 
        SET statut = :statut,
        WHERE id = :id");
        $request->bindValue(":id", $order->getId());
        $request->bindValue(":state", $order->getState());
        $request = $request->execute();
        
    }




}