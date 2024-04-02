<?php

namespace Form;

use Service\Session as Sess;
use Model\Entity\Utilisateur;
use Model\Repository\UtilisateurRepository;

class UtilisateurHandleRequest extends BaseHandleRequest
{
    private $utilisateurRepository;

    public function __construct()
    {
        $this->utilisateurRepository  = new UtilisateurRepository;
    }

    public function handleInsertForm(Utilisateur $utilisateur)
    {   
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            extract($_POST);
            $errors = [];

            
            $userExists = $this->utilisateurRepository->checkUserExist($emailUtilisateur);
            if(empty($mdpUtilisateur) || empty($nomUtilisateur) || empty($prenomUtilisateur) || empty($dateNaissanceUtilisateur) || empty($telephoneUtilisateur) || empty($sexeUtilisateur)){
                $errors[] = "Veuillez remplir les champs obligatoires";
            }
            
            if ($userExists) {
                $errors[] = "l'email existe déjà, veuillez en choisir un nouveau";
            }

            if (strlen($nomUtilisateur) < 2 && strlen($nomUtilisateur) > 30) {
                    $errors[] = "Le nom doit avoir au moins 2 caractères";
                }
            if (strlen($prenomUtilisateur) < 2 && strlen($prenomUtilisateur) > 30) {
                    $errors[] = "Le prénom doit avoir entre 2 et 30 caractères";
                }
            
            if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $mdpUtilisateur) && (strlen($mdpUtilisateur) < 8)){
                $errors[] = "Le mot de passe doit contenir au moins 8 caractere, une majuscule, un minuscule, un chiffre et un caractère spécial";
            }
            
            if (strlen($telephoneUtilisateur) != 10)  {
                    $errors[] = "Veuillez noter un nulméro valide";
                }
        

            if (empty($errors)) {
                $mdpUtilisateur = password_hash($mdpUtilisateur, PASSWORD_DEFAULT);
                $utilisateur->setNomUtilisateur($nomUtilisateur);
                $utilisateur->setPrenomUtilisateur($prenomUtilisateur);
                $utilisateur->setEmailUtilisateur($emailUtilisateur);
                $utilisateur->setMdpUtilisateur($mdpUtilisateur);
                $utilisateur->setDateNaissanceUtilisateur($dateNaissanceUtilisateur);
                $utilisateur->setTelephoneUtilisateur($telephoneUtilisateur);
                $utilisateur->setSexeUtilisateur($sexeUtilisateur);
                $utilisateur->setRoleUtilisateur($roleUtilisateur);

                return $this;
            }
            $this->setEerrorsForm($errors);
            return $this;
        }
    }

    public function handleEditForm(Utilisateur $utilisateur)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            extract($_POST);
            $errors = [];


            if(empty($nomUtilisateur) || empty($prenomUtilisateur) || empty($dateNaissanceUtilisateur) || empty($telephoneUtilisateur) || empty($sexeUtilisateur)){
                $errors[] = "Veuillez remplir les champs obligatoires";
            }
            
            if ($userExists) {
                $errors[] = "l'email existe déjà, veuillez en choisir un nouveau";
            }

            if (strlen($nomUtilisateur) < 2 && strlen($nomUtilisateur) > 30) {
                    $errors[] = "Le nom doit avoir au moins 2 caractères";
                }
            if (strlen($prenomUtilisateur) < 2 && strlen($prenomUtilisateur) > 30) {
                    $errors[] = "Le prénom doit avoir entre 2 et 30 caractères";
                }
            
            // if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $mdpUtilisateur) && (strlen($mdpUtilisateur) < 8)){
            //     $errors[] = "Le mot de passe doit contenir au moins 8 caractere, une majuscule, un minuscule, un chiffre et un caractère spécial";
            // }
            
            if (strlen($telephoneUtilisateur) != 10)  {
                    $errors[] = "Veuillez noter un numéro valide";
                }
        

            if (empty($errors)) {
                $utilisateur->setNomUtilisateur($nomUtilisateur);
                $utilisateur->setPrenomUtilisateur($prenomUtilisateur);
                $utilisateur->setEmailUtilisateur($emailUtilisateur);
                $utilisateur->setDateNaissanceUtilisateur($dateNaissanceUtilisateur);
                $utilisateur->setTelephoneUtilisateur($telephoneUtilisateur);
                $utilisateur->setSexeUtilisateur($sexeUtilisateur);

                return $this;
            }
            $this->setEerrorsForm($errors);
            return $this;
        }
    }
    
    public function handleLogin()
    {
        if (($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST["connexion"])) {

            extract($_POST);
            $errors = [];
            if (empty($email) || empty($mdpUtilisateur)) {
                $errors[] = "Veuillez inserer votre email et votre mot de passe";
            } else {
                /**
                 * @var Utilisateur
                 */
                $user = $this->utilisateurRepository->loginUser($email);
                if (empty($user)) {
                        $errors[] = "Il n'y a pas d'utilisateur avec cet email";
                } else {
                    if (!password_verify($mdpUtilisateur, $user->getMdpUtilisateur())) {
                        $errors[] = "Le mot de passe ne correspond pas";
                    }
                    if (!preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $mdpUtilisateur) && (strlen($mdpUtilisateur) < 8)){
                        $errors[] = "Le mot de passe doit contenir au moins 8 caractere, une majuscule, un minuscule, un chiffre et un caractère spécial";
                    }
                }
            }
            if (empty($errors)) {        
                Sess::authentication($user);
                return $this;
            }
            
            $this->setEerrorsForm($errors);
            return $this;
        }
    }

    
}