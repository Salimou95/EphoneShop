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
        redirection(addLink("utilisateur","connexion"));
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

    
    public function modifierUtilisateur($id)
    {
        if($this->getAdmin()){

            if (!empty($id) && is_numeric($id)) {
                
                $utilisateur = $this->utilisateurRepository->findById("utilisateur", $id);

                $this->form->handleEditForm($utilisateur);

                if ($this->form->isSubmitted() && $this->form->isValid()) {
                    $this->utilisateurRepository->udapteUtilisateur($utilisateur);
                }

                $errors = $this->form->getEerrorsForm();
                return $this->render("utilisateur/inscription.php", [
                    "h1" => "Update de l'utilisateur n° $id",
                    "utilisateur" => $utilisateur,
                    "errors" => $errors,
                    "mode" => "modification"
                ]);
            }
        }
    }

    public function deleteUtilisateur($id)
    {
        if($this->getAdmin()){
            if (!empty($id) && is_numeric($id)) {
                $utilisateur = $this->utilisateurRepository->findById("utilisateur", $id);
    
                    $this->utilisateurRepository->setIsDeletedTrueById($utilisateur);
                
                    $this->render("utilisateur/inscription.php", [
                        "h1" => "Supression de l'utilisateur n° $id",
                        "utilisateur" => $utilisateur,
                        "mode" => "suppression"
                    ]);
                    redirection(addLink("Accueil"));
            }
        }
    }

    public function profil($id)
    {
        if (!empty($id) && is_numeric($id)) {


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