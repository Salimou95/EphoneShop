<?php
namespace Model\Repository;

use Model\Entity\Telephone;
use Service\Session;

class TelephoneRepository extends BaseRepository{


    public function addTelephone(Telephone $telephone){
        try{
            $telephone->setFk_utilisateur($_SESSION["user"]->getId());
            $telephone->setFk_utilisateur($_SESSION["user"]->getId());
            $requete = $this->dbConnection->prepare("INSERT INTO `telephone` (`fk_marque`,`fk_utilisateur`, `prix`, `modele`, `couleur`, `systemeexploitation`, `ram`,`memoire`,`paysfabrication`,`description`, `quantite`, `image`) VALUES (:fk_marque, :fk_utilisateur, :prix, :modele, :couleur, :systemeexploitation,:ram,:memoire,:paysfabrication, :description, :quantite,:image)");
            
            $requete->bindValue(':fk_marque', $telephone->getFk_marque(),  \PDO::PARAM_INT);
            $requete->bindValue(':fk_utilisateur', $telephone->getFk_utilisateur(),  \PDO::PARAM_INT);
            $requete->bindValue(':prix', $telephone->getPrix(),  \PDO::PARAM_INT);
            $requete->bindValue(':modele', $telephone->getModele());
            $requete->bindValue(':couleur', $telephone->getCouleur());
            $requete->bindValue(':systemeexploitation', $telephone->getSystemeexploitation());
            $requete->bindValue(':ram', $telephone->getRam(),  \PDO::PARAM_INT);
            $requete->bindValue(':memoire', $telephone->getMemoire(),  \PDO::PARAM_INT);
            $requete->bindValue(':paysfabrication', $telephone->getPaysfabrication());
            $requete->bindValue(':description', $telephone->getDescription());
            $requete->bindValue(':quantite', $telephone->getQuantite(),  \PDO::PARAM_INT);
            $requete->bindValue(':image', $telephone->getImage());

            $requete->execute();
            
        }catch (PDOException $e) {
            echo "Erreur lors de l'enregistrement du telephone : " . $e->getMessage();
        }
    }

    public function udapteTelephone(Telephone $telephone){
        try {
            $requete = $this->dbConnection->prepare("UPDATE `telephone` SET `fk_marque` = :fk_marque, `prix` = :prix, `modele` = :modele, `couleur` = :couleur, `systemeexploitation` = :systemeexploitation, `ram` = :ram, `memoire` = :memoire, `paysfabrication` = :paysfabrication, `description` = :description, `quantite` = :quantite, `image` = :image WHERE `telephone`.`idTelephone` = :idTelephone");
    
            $requete->bindValue(':fk_marque', $telephone->getFk_marque());
            $requete->bindValue(':prix', $telephone->getPrix());
            $requete->bindValue(':modele', $telephone->getModele());
            $requete->bindValue(':couleur', $telephone->getCouleur());
            $requete->bindValue(':systemeexploitation', $telephone->getSystemeexploitation());
            $requete->bindValue(':ram', $telephone->getRam());
            $requete->bindValue(':memoire', $telephone->getMemoire());
            $requete->bindValue(':paysfabrication', $telephone->getPaysfabrication());
            $requete->bindValue(':description', $telephone->getDescription());
            $requete->bindValue(':quantite', $telephone->getQuantite());
            $requete->bindValue(':image', $telephone->getImage());
            $requete->bindValue(':idTelephone', $telephone->getId());
    
            $requete->execute();

        }catch (PDOException $e) {
            echo "Erreur lors de la modification du telephone : " . $e->getMessage();
        }
    }

}