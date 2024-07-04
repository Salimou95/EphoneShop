<?php
/**
 * Summary of namespace Controller
 */
namespace Controller;

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


    public function created(){
        
        	$utilisateur = $this->utilisateur;
            
            $this->form->handleInsertForm($utilisateur);
            if ($this->form->isSubmitted() && $this->form->isValid()) {
                
                $idutilisateur = $this->utilisateurRepository->registrationUser($utilisateur);
                $this->setMessage("success",  "  Féliciation, vous êtes inscrit");

                return redirection(addLink("Utilisateur","connexion"));
            }
            $errors = $this->form->getEerrorsForm();

            $this->render("Utilisateur/inscription.php", [
                "h1" => "Inscription",
                "utilisateur" => $utilisateur,
                "errors" => $errors,
                "mode"=>"insertion"

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

    public function index()
    {
        $utilisateur = $this->utilisateur;

        $users = $this->userRepository->findAll($this->user);

        

        $this->render("user/index.html.php", [
            "h1" => "Liste des utilisateurs",
            "users" => $users
        ]);
    }
    
    public function profil()
    {

        if ($this->isUserConnected()) {  
            $utilisateur = $this->getUser();                    
                    $utilisateur = $this->utilisateurRepository->findById("utilisateur", $this->getidUser());
                    $this->form->handleEditForm($utilisateur);

                    if ($this->form->isSubmitted() && $this->form->isValid()) {
                        $this->utilisateurRepository->udapteUtilisateur($utilisateur);
                        $this->setMessage("success",  "Votre profil a été modifié");
                    }

                    $errors = $this->form->getEerrorsForm();
                    return $this->render("utilisateur/profil.php", [
                        "h1" => "Mon profil",
                        "utilisateur" => $utilisateur,
                        "errors" => $errors,
                        "mode" => "modification"
                    ]);   
            
        }else{
            error(403);
        }
        
    }


    public function delete($id)
    {
        if (!empty($id) && is_numeric($id)) {
            if ($this->isUserConnected()) {  
                 if ($id === $this->getidUser()){
                    $utilisateur = $this->getUser();    
                    $this->utilisateurRepository->remove($utilisateur);
                    
                    $this->render("utilisateur/inscription.php", [
                        "h1" => "Supression de l'utilisateur n° $id",
                        "utilisateur" => $utilisateur,
                        "mode" => "suppression"
                        ]);
                        redirection(addLink("Accueil"));
                    }else{
                        error(403);
                    }
                }else{
                    error(403);
                }       
            }else{
                error(403);
            }
    }
    public function logout()
    {
        $this->disconnection();
        $this->setMessage("success", "Vous êtes déconnecté");
        redirection(addLink("Accueil"));
    }
}