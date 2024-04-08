<?php
namespace Model\Repository;

use Model\Entity\Commentaire;
use Model\Entity\Utilisateur;
// use Model\Entity\Telephone;
use Service\Session;

class DetailPanierRepository extends BaseRepository{

    public function addCommentaire(Commentaire $commentaire, $id){
        try{
            $commentaire->setFk_utilisateur($_SESSION["user"]->getId());
            $resultat = $this->dbConnection->prepare("INSERT INTO `commentaire` (`avis`, `note`, `fk_Utilisateur`, `fk_Telephone`,`created_at`) VALUES (:avis, :note, :fk_Utilisateur, :fk_Telephone, NOW())");
        
            $resultat->bindValue(":avis", $commentaire->getAvis(), \PDO::PARAM_STR);
            $resultat->bindValue(":note", $commentaire->getNote(),  \PDO::PARAM_INT);
            $resultat->bindValue(":fk_Utilisateur",$commentaire->getFk_utilisateur(),  \PDO::PARAM_INT);
            $resultat->bindValue(":fk_Telephone", $id,  \PDO::PARAM_INT);
            $resultat->execute();
        }catch(PDOException $e) {
            die("Erreur lors de l'insertion du commentaire: " . $e->getMessage());
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
            die("Erreur lors de l'affichage du commentaire: " . $e->getMessage());
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
            die("Erreur lors de l'enregistrement du commentaire: " . $e->getMessage());
        }
    }



}