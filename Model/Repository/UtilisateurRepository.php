<?php
namespace Model\Repository;

use Model\Entity\Utilisateur;
use Service\Session;

class UtilisateurRepository extends BaseRepository{



    public function checkUserExist($emailUtilisateur)
    {
        $request = $this->dbConnection->prepare("SELECT COUNT(*) FROM utilisateur WHERE emailUtilisateur = :emailUtilisateur");
        $request->bindParam(":emailUtilisateur", $emailUtilisateur);

        $request->execute(); 
        $count = $request->fetchColumn();
        return $count > 1 ? true : false;
    }


    public function registrationUser(Utilisateur $utilisateur) {
        try {
            // $role = 2;
            // $mdpUtilisateur = password_hash($utilisateur->getMdpUtilisateur(), PASSWORD_DEFAULT);
            $resultat = $this->dbConnection->prepare("INSERT INTO `utilisateur` (`nomUtilisateur`, `prenomUtilisateur`, `emailUtilisateur`, `mdpUtilisateur`, `dateNaissanceUtilisateur`, `telephoneUtilisateur`, `sexeUtilisateur`,roleUtilisateur) VALUES (:nomUtilisateur, :prenomUtilisateur, :emailUtilisateur, :mdpUtilisateur, :dateNaissanceUtilisateur, :telephoneUtilisateur, :sexeUtilisateur,:roleUtilisateur)");
            $resultat->bindValue(":nomUtilisateur", $utilisateur->getNomUtilisateur());
            $resultat->bindValue(":prenomUtilisateur", $utilisateur->getPrenomUtilisateur());
            $resultat->bindValue(":emailUtilisateur", $utilisateur->getEmailUtilisateur());
            $resultat->bindValue(":mdpUtilisateur", $utilisateur->getMdpUtilisateur());
            $resultat->bindValue(":dateNaissanceUtilisateur", $utilisateur->getDateNaissanceUtilisateur());
            $resultat->bindValue(":telephoneUtilisateur", $utilisateur->getTelephoneUtilisateur(), \PDO::PARAM_INT);
            $resultat->bindValue(":sexeUtilisateur", $utilisateur->getSexeUtilisateur());
            $resultat->bindValue(":roleUtilisateur", $utilisateur->getRoleUtilisateur());
            $resultat->execute();

            // $lastUserId = $this->bdd->lastInsertId();

            // $resultatPanier = $this->bdd->prepare("INSERT INTO `panier` (`quantitePanier`, `fk_UtilisateurPanier`) VALUES (0, :fk_UtilisateurPanier)");
            // $resultatPanier->bindParam(":fk_UtilisateurPanier", $lastUserId, PDO::PARAM_INT);
            // $resultatPanier->execute();

            // $resultatWishlist = $this->bdd->prepare("INSERT INTO `wishlist` (`fk_UtilisateurWishlist`, `nbArticleWishlist`) VALUES (:fk_UtilisateurWishlist,0)");
            // $resultatWishlist->bindParam(":fk_UtilisateurWishlist", $lastUserId, PDO::PARAM_INT);
            // $resultatWishlist->execute();
            // header('Location: index.php?page=connexion'); 
            // echo "Utilisateur inscrit avec succès, panier créé.";
        }catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement de l'utilisateur : " . $e->getMessage();
        }
        }

        public function loginUser($email) {        
            $request = $this->dbConnection->prepare("SELECT * FROM utilisateur WHERE emailUtilisateur = :emailUtilisateur");
            $request->bindParam(":emailUtilisateur", $email);
    
            if ($request->execute()) {
                if ($request->rowCount() == 1) {
                    $request->setFetchMode(\PDO::FETCH_CLASS, "Model\Entity\utilisateur");
                    return $request->fetch();
                } else {
                    return false;
                }
            } else {
                return null;
            }
        }
}