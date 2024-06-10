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

            $request = $this->dbConnection->prepare("INSERT INTO `detailCommande` (`fkCommande`, `fkTelephone`, `quantite`, `created_at`) VALUES (:fkCommande, :fkTelephone, :quantite, NOW());");
            $request->bindParam(':fkCommande', $idCommande);
            $request->bindParam(':fkTelephone', $idTelephone);
            $request->bindParam(':quantite', $quantite);
            $request->execute();
        }catch(PDOException $e) {
            exit("Erreur lors de la creation du détail la commande: " . $e->getMessage());
        }
    
    }

    public function getCommande(Commande $commande, $id){
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