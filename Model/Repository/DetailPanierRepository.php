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
            $request = $this->dbConnection->prepare("INSERT INTO `commentaire` (`avis`, `note`, `fk_Utilisateur`, `fk_Telephone`,`created_at`) VALUES (:avis, :note, :fk_Utilisateur, :fk_Telephone, NOW())");
        
            $request->bindValue(":avis", $commentaire->getAvis(), \PDO::PARAM_STR);
            $request->bindValue(":note", $commentaire->getNote(),  \PDO::PARAM_INT);
            $request->bindValue(":fk_Utilisateur",$commentaire->getFk_utilisateur(),  \PDO::PARAM_INT);
            $request->bindValue(":fk_Telephone", $id,  \PDO::PARAM_INT);
            $request->execute();
        }catch(PDOException $e) {
            exit("Erreur lors de l'insertion du commentaire: " . $e->getMessage());
        }
    
    }

    public function getCommentaire(Commentaire $commentaire, $id){
        try{

            $request = $this->dbConnection->prepare("SELECT commentaire.*, utilisateur.nomUtilisateur, utilisateur.prenomUtilisateur, utilisateur.id as utilisateur_id FROM commentaire INNER JOIN utilisateur ON commentaire.fk_Utilisateur = utilisateur.id WHERE fk_Telephone = :id ORDER BY created_at DESC");
            $request->bindValue(":id", $id);
            $request->execute();
            $request->setFetchMode(\PDO::FETCH_CLASS, "Model\Entity\Commentaire");
            return $request->fetchAll();
            
        }catch (PDOException $e) {
            exit("Erreur lors de l'affichage du commentaire: " . $e->getMessage());
        }
    }

    public function udapteCommentaire(Commentaire $commentaire){
        try{
            $request = $this->dbConnection->prepare("UPDATE commentaire SET avis = :avis, note = :note WHERE id = :id");
            $request->bindValue(":avis", $commentaire->getAvis(), \PDO::PARAM_STR);
            $request->bindValue(":note", $commentaire->getNote(),  \PDO::PARAM_INT);
            $request->bindValue(":id", $commentaire->getId(),  \PDO::PARAM_INT);
            $request->execute();
        }catch(PDOException $e) {
            exit("Erreur lors de l'enregistrement du commentaire: " . $e->getMessage());
        }
    }



}