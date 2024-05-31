<?php
namespace Model\Repository;

use Model\Entity\DetailCommande;


class DetailCommandeRepository extends BaseRepository{

    public function createDetailCommande($idCommande,$idTelephone,$quantite){
        try{
            $detailCommande = new DetailCommande;
            $detailCommande->setFkCommande($idCommande)
                ->setFkTelephone($idTelephone)
                ->setQuantite($quantite);

            $requete = $this->dbConnection->prepare("INSERT INTO `detailCommande` (`fkCommande`, `fkTelephone`, `quantite`, `created_at`) VALUES (:fkCommande, :fkTelephone, :quantite, NOW());");
            $requete->bindParam(':fkCommande', $idCommande);
            $requete->bindParam(':fkTelephone', $idTelephone);
            $requete->bindParam(':quantite', $quantite);
            $requete->execute();
        }catch(PDOException $e) {
            exit("Erreur lors de la creation du détail la commande: " . $e->getMessage());
        }
    
    }

    public function getCommande(Commande $commande, $id){
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