<?php

namespace Controller;
use Model\Entity\Marque;
use Model\Repository\MarqueRepository;
use Model\Entity\Telephone;
use Model\Repository\TelephoneRepository;
use Form\TelephoneHandleRequest;
use Model\Entity\Commentaire;
use Model\Repository\CommentaireRepository;
use Model\Entity\Utilisateur;
use Model\Repository\UtilisateurRepository;
use Form\CommentaireHandleRequest;


use Controller\BaseController;


class TelephoneController extends BaseController
{
    private Marque $marque;
    private MarqueRepository $marqueRepository;
    private TelephoneRepository $telephoneRepository;
    // private Telephone $telephone;
    private TelephoneHandleRequest $telephoneHandleRequest;  
    private Commentaire $commentaire;
    private CommentaireRepository $commentaireRepository; 
    private CommentaireHandleRequest $commentaireHandleRequest;
    private Utilisateur $utilisateur;
    private UtilisateurRepository $utilisateurRepository;
    

    public function __construct()
    {
        $this->marque = new Marque;
        $this->marqueRepository = new MarqueRepository;
        $this->telephoneRepository = new TelephoneRepository;
        // $this->$telephone = new Telephone;
        $this->telephoneHandleRequest = new TelephoneHandleRequest;
        $this->commentaire = new Commentaire;
        $this->commentaireRepository = new CommentaireRepository;
        $this->commentaireHandleRequest = new CommentaireHandleRequest;
        $this->utilisateur = new Utilisateur;
    }

    public function index()
    {
        $telephone = new telephone;
        $telephones = $this->telephoneRepository->findAll($telephone);

        $this->render("Accueil.php", [

            "h1" => "Nos téléphones",
            "telephones" => $telephones
        ]);
    }
    
    public function read($id)
    {


        if (!empty($id) && is_numeric($id)) {   

            $tel = new TelephoneRepository;
            $telephone = $tel->findById('telephone', $id);
            if(empty($telephone)){
                $this->setMessage("danger",  "Le telephone NO $id n'existe pas");
                redirection(addLink("Accueil"));
            }else{
                $commentaire = new Commentaire;
                $commentaires = $this->commentaireRepository->getCommentaire($commentaire, $id);
                $moyenne = $this->commentaireRepository->moyenneNote($id);
                foreach($commentaires as $comm){
                    $comm->setUtilisateur($comm);
                }
                $this->commentaireHandleRequest->handleInsertForm($commentaire);
                    if ($this->commentaireHandleRequest->isSubmitted() && $this->commentaireHandleRequest->isValid()) {
                        if ($this->isUserConnected()) {            
                            $this->commentaireRepository->addCommentaire($commentaire, $id);
                            $this->setMessage("success",  "Commentaire ajouté avec succcess");
                            return redirection(addLink("telephone","read",$id));
                        }else{
                            $this->setMessage("danger","Vous devez etre connecté pour ajouter un commentaire");
                            return redirection(addLink("Utilisateur","connexion"));
                        }
                        
                    }

        
                $errors = $this->commentaireHandleRequest->getEerrorsForm();
      
                $this->render("telephone/Telephone.php", [
                "telephone" => $telephone,
                "h1" => "Fiche product",
                "commentaires" => $commentaires,
                "errors" => $errors,
                "moyenne" => $moyenne
                ]);

                }
                    }else{
            error(404);
        }
    }

    
   
}