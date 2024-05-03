<?php
namespace Model\Repository;

use Model\Entity\Commande;
use Model\Entity\Utilisateur;

class CommandeRepository extends BaseRepository{

    public function createCommande(Commande $commande){
        try{
            $commande->setFk_UtilisateurCommande($_SESSION["user"]->getId());
            $requete = $this->dbConnection->prepare("INSERT INTO `commande` (`statut`, `dateLivraison`, `prix`, `fk_UtilisateurCommande `,`created_at`) VALUES (:statut, :dateLivraison, :prix, :fk_UtilisateurCommande, NOW())");
        
            $requete->bindValue(":statut", $commande->getStatut(), \PDO::PARAM_STR);
            $requete->bindValue(":dateLivraison", $commande->getDateLivraison(),  \PDO::PARAM_INT);
            $requete->bindValue(":prix",$commande->getPrix(),  \PDO::PARAM_INT);
            $requete->bindValue(":fk_UtilisateurCommande", $commande->getFk_UtilisateurCommande(),  \PDO::PARAM_INT);
            $requete->execute();
        }catch(PDOException $e) {
            exit("Erreur lors de l'insertion de la commande: " . $e->getMessage());
        }
    
    }

    public function getCommentaire(Commentaire $commentaire, $id){
        try{

            $resultat = $this->dbConnection->prepare("SELECT commentaire.*, utilisateur.nomUtilisateur, utilisateur.prenomUtilisateur, utilisateur.id as utilisateur_id FROM commentaire INNER JOIN utilisateur ON commentaire.fk_Utilisateur = utilisateur.id WHERE fk_Telephone = :id ORDER BY created_at DESC");
            $resultat->bindValue(":id", $id);
            $resultat->execute();
            $resultat->setFetchMode(\PDO::FETCH_CLASS, "Model\Entity\Commentaire");
            return $resultat->fetchAll();
            
        }catch (PDOException $e) {
            exit("Erreur lors de l'affichage du commentaire: " . $e->getMessage());
        }
    }

    public function udapteCommentaire(Commentaire $commentaire){
        try{
            $resultat = $this->dbConnection->prepare("UPDATE commentaire SET avis = :avis, note = :note WHERE id = :id");
            $resultat->bindValue(":avis", $commentaire->getAvis(), \PDO::PARAM_STR);
            $resultat->bindValue(":note", $commentaire->getNote(),  \PDO::PARAM_INT);
            $resultat->bindValue(":id", $commentaire->getId(),  \PDO::PARAM_INT);
            $resultat->execute();
        }catch(PDOException $e) {
            exit("Erreur lors de l'enregistrement du commentaire: " . $e->getMessage());
        }
    }



}