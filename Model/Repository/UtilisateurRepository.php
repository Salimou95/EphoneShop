<?php
namespace Model\Repository;

use Model\Entity\Utilisateur;
use Service\Session;

class UtilisateurRepository extends BaseRepository{

    public function checkUserExist($emailUtilisateur)
    {
        try{
            $request = $this->dbConnection->prepare("SELECT COUNT(*) FROM utilisateur WHERE emailUtilisateur = :emailUtilisateur");
            $request->bindParam(":emailUtilisateur", $emailUtilisateur);
    
            $request->execute(); 
            $count = $request->fetchColumn();
            return $count > 1 ? true : false;
        }catch (PDOException $e) {
            exit("Erreur lors de la verification email de l'utilisateur existant: " . $e->getMessage());
        }
        
    }

    public function registrationUser(Utilisateur $utilisateur) {
        try {
            $request = $this->dbConnection->prepare("INSERT INTO `utilisateur` (`nomUtilisateur`, `prenomUtilisateur`, `emailUtilisateur`, `mdpUtilisateur`, `dateNaissanceUtilisateur`, `telephoneUtilisateur`, `sexeUtilisateur`,roleUtilisateur) VALUES (:nomUtilisateur, :prenomUtilisateur, :emailUtilisateur, :mdpUtilisateur, :dateNaissanceUtilisateur, :telephoneUtilisateur, :sexeUtilisateur,:roleUtilisateur)");
            $request->bindValue(":nomUtilisateur", $utilisateur->getNomUtilisateur(), \PDO::PARAM_STR);
            $request->bindValue(":prenomUtilisateur", $utilisateur->getPrenomUtilisateur(), \PDO::PARAM_STR);
            $request->bindValue(":emailUtilisateur", $utilisateur->getEmailUtilisateur(), \PDO::PARAM_STR);
            $request->bindValue(":mdpUtilisateur", $utilisateur->getMdpUtilisateur(), \PDO::PARAM_STR);
            $request->bindValue(":dateNaissanceUtilisateur", $utilisateur->getDateNaissanceUtilisateur());
            $request->bindValue(":telephoneUtilisateur", $utilisateur->getTelephoneUtilisateur(), \PDO::PARAM_INT);
            $request->bindValue(":sexeUtilisateur", $utilisateur->getSexeUtilisateur(), \PDO::PARAM_STR);
            $request->bindValue(":roleUtilisateur", $utilisateur->getRoleUtilisateur(), \PDO::PARAM_STR);
            $request->execute();
        }catch (PDOException $e) {
            exit ("Erreur lors de l'enregistrement de l'utilisateur : " . $e->getMessage());
        }
        }

        public function loginUser($email) { 
            try{
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
            }catch (PDOException $e) {
            exit ("Erreur lors de la connexion de l'utilisateur : " . $e->getMessage());
        }
        
            
            
        }

        public function udapteUtilisateur(Utilisateur $utilisateur){
            try{
                $request = $this->dbConnection->prepare("UPDATE `utilisateur` SET `nomUtilisateur` = :nomUtilisateur, `prenomUtilisateur`= :prenomUtilisateur, `emailUtilisateur` = :emailUtilisateur, `dateNaissanceUtilisateur` = :dateNaissanceUtilisateur, `telephoneUtilisateur` = :telephoneUtilisateur, `sexeUtilisateur` = :sexeUtilisateur  WHERE `utilisateur`.`id` = :id;");
                $request->bindValue(":id", $utilisateur->getId(), \PDO::PARAM_INT);
                $request->bindValue(":nomUtilisateur", $utilisateur->getNomUtilisateur(), \PDO::PARAM_STR);
                $request->bindValue(":prenomUtilisateur", $utilisateur->getPrenomUtilisateur(), \PDO::PARAM_STR);
                $request->bindValue(":emailUtilisateur", $utilisateur->getEmailUtilisateur(), \PDO::PARAM_STR);
                $request->bindValue(":dateNaissanceUtilisateur", $utilisateur->getDateNaissanceUtilisateur(), \PDO::PARAM_STR);
                $request->bindValue(":telephoneUtilisateur", $utilisateur->getTelephoneUtilisateur(), \PDO::PARAM_INT);
                $request->bindValue(":sexeUtilisateur", $utilisateur->getSexeUtilisateur(), \PDO::PARAM_STR);
                $request->execute();
            }catch (PDOException $e) {
                exit ("Erreur lors de la mise a jour de l'utilisateur : " . $e->getMessage());
            }
        }
}