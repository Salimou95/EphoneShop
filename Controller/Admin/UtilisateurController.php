<?php
/**
 * Summary of namespace Controller
 */
namespace Controller\Admin;

use Model\Entity\Utilisateur;
use Model\Repository\UtilisateurRepository;
use Form\UtilisateurHandleRequest;
use Model\Entity\Marque;
use Model\Repository\MarqueRepository;
use Controller\BaseController;


/**
 * Summary of UserController
 */
class UtilisateurController extends BaseController
{
    private UtilisateurRepository $utilisateurRepository;
    private UtilisateurHandleRequest $form;
    private Utilisateur $utilisateur;
    
    

    public function __construct()
    {
        $this->utilisateurRepository = new UtilisateurRepository;
        $this->form = new UtilisateurHandleRequest;
        $this->utilisateur = new Utilisateur;
    }


    public function inscription(){
        
        	$utilisateur = $this->utilisateur;
            
            $this->form->handleInsertForm($utilisateur);
            if ($this->form->isSubmitted() && $this->form->isValid()) {
                
                $this->utilisateurRepository->registrationUser($utilisateur);
                return redirection(addLink("Utilisateur","connexion"));
            }
            $errors = $this->form->getEerrorsForm();

            $this->render("Utilisateur/inscription.php", [
                "h1" => "Inscription",
                "user" => $utilisateur,
                "errors" => $errors

            ]);


    }


    public function connexion()
    {
        
        if ($this->isUserConnected()) {            
            /**
             * @var Utilisateur
             */
            $user = $this->getUser();

                $this->setMessage("erreur",  $user->getPrenomUtilisateur() . " , vous êtes déjà connecté");
            return redirection(addLink("Accueil"));
        }

        $this->form->handleLogin();
        
        if ($this->form->isSubmitted() && $this->form->isValid()) {
            /**
            * @var Utilisateur

             */
            $user = $this->getUser();
            $this->setMessage("succes", "Bonjour " . $user->getPrenomUtilisateur() .", vous êtes connecté");
            redirection(addLink("Accueil"));
            return redirection(addLink("Accueil"));
        }

        $errors = $this->form->getEerrorsForm();

        return $this->render("Utilisateur/connexion.php", [
            "h1" => "Connexion",
            "errors" => $errors
            
        ]);
    }

    public function deconnexion()
    {
        $this->disconnection();
        $this->setMessage("success", "Vous êtes déconnecté");
        redirection(addLink("Accueil"));
    }
    

    public function list()
    {
        $utilisateur = $this->utilisateur;

        $utilisateurs = $this->utilisateurRepository->findAll($utilisateur);

        

        $this->render("Admin/Utilisateur/Utilisateurs.php", [
            "h1" => "Liste des utilisateurs",
            "utilisateurs" => $utilisateurs
        ]);
    }

    
    public function edit($id)
    {
        if (!empty($id) && is_numeric($id) && $this->getUser()) {

            /**
             * @var User
             */
            $user = $this->getUser();

            $this->form->handleEditForm($user);

            if ($this->form->isSubmitted() && $this->form->isValid()) {
                $this->userRepository->updateUser($user);
                return redirection(addLink("home"));
            }

            $errors = $this->form->getEerrorsForm();
            return $this->render("user/form.html.php", [
                "h1" => "Update de l'utilisateur n° $id",
                "user" => $user,
                "errors" => $errors
            ]);
        }
        return redirection("/errors/404.php");
    }

    public function delete($id)
    {
        if (!empty($id) && $id && $this->getUser()) {
            if (is_numeric($id)) {

                $user = $this->user;
            } else {
                $this->setMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
            }
        } else {
            $this->setMessage("danger",  "ERREUR 404 : la page demandé n'existe pas");
        }

        $this->render("user/form.html.php", [
            "h1" => "Suppresion de l'user n°$id ?",
            "user" => $user,
            "mode" => "suppression"
        ]);
    }

    public function profil()
    {

        if ($this->isUserConnected()) {            
            $user = $this->getUser();
                if (empty($user)) {
                $this->setMessage("danger",  "L'utilisateur n'existe pas");
                // redirection(addLink("home"));
            }
        } 
        $this->render("utilisateur/profil.php", [
            "user" => $user,
            "h1" => "Fiche user"
        ]);


        
    }


    public function logout()
    {
        $this->disconnection();
        $this->setMessage("success", "Vous êtes déconnecté");
        redirection(addLink("home"));
    }
}