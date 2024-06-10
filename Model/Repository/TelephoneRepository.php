<?php
namespace Model\Repository;

use Model\Entity\Telephone;
use Service\Session;

class TelephoneRepository extends BaseRepository{


    public function addTelephone(Telephone $telephone){
        try{
            $telephone->setFk_utilisateur($_SESSION["user"]->getId());
            $request = $this->dbConnection->prepare("INSERT INTO `telephone` (`fk_marque`,`fk_utilisateur`, `prix`, `modele`, `couleur`, `systemeexploitation`, `ram`,`memoire`,`paysfabrication`,`description`, `quantite`, `image`) VALUES (:fk_marque, :fk_utilisateur, :prix, :modele, :couleur, :systemeexploitation,:ram,:memoire,:paysfabrication, :description, :quantite,:image)");
            
            $request->bindValue(':fk_marque', $telephone->getFk_marque(),  \PDO::PARAM_INT);
            $request->bindValue(':fk_utilisateur', $telephone->getFk_utilisateur(),  \PDO::PARAM_INT);
            $request->bindValue(':prix', $telephone->getPrix(),  \PDO::PARAM_INT);
            $request->bindValue(':modele', $telephone->getModele(), \PDO::PARAM_STR);
            $request->bindValue(':couleur', $telephone->getCouleur(), \PDO::PARAM_STR);
            $request->bindValue(':systemeexploitation', $telephone->getSystemeexploitation(), \PDO::PARAM_STR);
            $request->bindValue(':ram', $telephone->getRam(),  \PDO::PARAM_INT);
            $request->bindValue(':memoire', $telephone->getMemoire(),  \PDO::PARAM_INT);
            $request->bindValue(':paysfabrication', $telephone->getPaysfabrication(), \PDO::PARAM_STR);
            $request->bindValue(':description', $telephone->getDescription(), \PDO::PARAM_STR);
            $request->bindValue(':quantite', $telephone->getQuantite(),  \PDO::PARAM_INT);
            $request->bindValue(':image', $telephone->getImage(), \PDO::PARAM_STR);

            $request->execute();
            
        }catch (PDOException $e) {
            exit("Erreur lors de la creation du telephone : " . $e->getMessage());
        }
    }

    public function udapteTelephone(Telephone $telephone){
        try {
            $request = $this->dbConnection->prepare("UPDATE `telephone` SET `fk_marque` = :fk_marque, `prix` = :prix, `modele` = :modele, `couleur` = :couleur, `systemeexploitation` = :systemeexploitation, `ram` = :ram, `memoire` = :memoire, `paysfabrication` = :paysfabrication, `description` = :description, `quantite` = :quantite, `image` = :image WHERE `telephone`.`id` = :idTelephone");
    
            $request->bindValue(':fk_marque', $telephone->getFk_marque(), \PDO::PARAM_INT);
            $request->bindValue(':prix', $telephone->getPrix(), \PDO::PARAM_INT);
            $request->bindValue(':modele', $telephone->getModele(), \PDO::PARAM_STR);
            $request->bindValue(':couleur', $telephone->getCouleur(), \PDO::PARAM_STR);
            $request->bindValue(':systemeexploitation', $telephone->getSystemeexploitation(), \PDO::PARAM_STR);
            $request->bindValue(':ram', $telephone->getRam(), \PDO::PARAM_INT);
            $request->bindValue(':memoire', $telephone->getMemoire(), \PDO::PARAM_INT);
            $request->bindValue(':paysfabrication', $telephone->getPaysfabrication(), \PDO::PARAM_STR);
            $request->bindValue(':description', $telephone->getDescription(), \PDO::PARAM_STR);
            $request->bindValue(':quantite', $telephone->getQuantite(), \PDO::PARAM_STR);
            $request->bindValue(':image', $telephone->getImage(), \PDO::PARAM_STR);
            $request->bindValue(':idTelephone', $telephone->getId(), \PDO::PARAM_INT);
    
            $request->execute();

        }catch (PDOException $e) {
            exit("Erreur lors de la modification du telephone : " . $e->getMessage());
        }
    }

    public function checkTelephoneExist($modele)
    {
        try{
            $request = $this->dbConnection->prepare("SELECT COUNT(*) FROM telephone WHERE modele = :modele");
            $request->bindParam(":modele", $modele);
            $request->execute(); 
            $count = $request->fetchColumn();
            return $count > 0 ? true : false;
        }catch (PDOException $e) {
            echo "Erreur lors de la verification email de l'utilisateur existant: " . $e->getMessage();
        }
        
    }

    public function updateQuantityTelephone($telephoneId, $quantite)
    {
        try{
            $request = $this->dbConnection->prepare("UPDATE telephone 
            SET quantite = quantite - :quantite
            WHERE id = :id");
    
            $request->bindValue(":id", $telephoneId);
            $request->bindValue(":quantite", $quantite);
    
            $request->execute();

        }catch (PDOException $e) {

            exit("Erreur lors de la modification des stocks: " . $e->getMessage());

        }

        
    }


}