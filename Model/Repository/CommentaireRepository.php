<?php
namespace Model\Repository;

use Model\Entity\Commentaire;
use Model\Entity\Telephone;
use Service\Session;

class CommentaireRepository extends BaseRepository{

    public function addCommentaire(Commentaire $commentaire, $id){
        try{
            $commentaire->setFk_utilisateur($_SESSION["user"]->getIdUtilisateur());
            $resultat = $this->dbConnection->prepare("INSERT INTO `commentaire` (`commentaire`, `note`, `fk_Utilisateur`, `fk_Telephone`,`created_at`) VALUES (:commentaire, :note, :fk_Utilisateur, :fk_Telephone, NOW())");
        
            $resultat->bindValue(":commentaire", $commentaire->getCommentaire());
            $resultat->bindValue(":note", $commentaire->getNote());
            $resultat->bindValue(":fk_Utilisateur",$commentaire->getFk_utilisateur());
            $resultat->bindValue(":fk_Telephone", $id);
            $resultat->execute();
        }catch(PDOException $e) {
            die("Erreur lors de l'insertion : " . $e->getMessage());
        }
    
    }

    public function getCommentaire(Commentaire $commentaire, $id){
        try{

            $resultat = $this->dbConnection->prepare("SELECT * FROM commentaire INNER JOIN utilisateur ON commentaire.fk_Utilisateur = utilisateur.idUtilisateur WHERE fk_Telephone = :id");
            $resultat-> bindValue(":id", $id);
            $resultat->execute();
            $commentget = $resultat -> fetchAll(\PDO::FETCH_CLASS, "Model\Entity\Commentaire");
            return $commentget; 
        }catch (PDOException $e) {
            die("Erreur lors de l'affichage : " . $e->getMessage());
        }
    }


}