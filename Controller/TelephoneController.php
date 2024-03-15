<?php

namespace Controller;
use Model\Entity\Marque;
use Model\Repository\MarqueRepository;
use Model\Entity\Telephone;
use Model\Repository\TelephoneRepository;
use Form\TelephoneHandleRequest;
use Model\Entity\Commentaire;
use Model\Repository\CommentaireRepository;
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
    }

    
    
    public function telephone($id)
    {


        if (!empty($id) && is_numeric($id)) {            
            $tel = new TelephoneRepository;
            $telephones = $tel->findById('telephone', $id);
            $commentaire = new Commentaire;
            $commentaires = $this->commentaireRepository->getCommentaire($commentaire, $id);
            $this->commentaireHandleRequest->handleInsertForm($commentaire);
            if ($this->commentaireHandleRequest->isSubmitted() && $this->commentaireHandleRequest->isValid()) {
                
                $this->commentaireRepository->addCommentaire($commentaire, $id);
                // return redirection(addLink("Utilisateur","connexion"));
            }
            $errors = $this->commentaireHandleRequest->getEerrorsForm();
                if (empty($telephones)) {
                $this->setMessage("danger",  "Le telephone NO $id n'existe pas");
                // redirection(addLink("home"));
            }
            $this->render("telephone/Telephone.php", [
            "telephone" => $telephones,
            "h1" => "Fiche product",
            "commentaire" => $commentaires
            ]);
        }else{
            error("404.php");
        }
    }

    
   
}