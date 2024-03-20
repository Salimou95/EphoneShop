<?php

namespace Controller\Admin;


use Model\Entity\Marque;
use Model\Repository\MarqueRepository;
use Controller\BaseController;

class MarqueController extends BaseController
{
    private MarqueRepository $marqueRepository;
    private Marque $marque;

    public function __construct()
    {
        $this->marqueRepository = new MarqueRepository;
        $this->marque = new Marque;
    }
    public function list()
    {
        $marques = $this->marqueRepository->findAll($this->marque);

        $this->render("Admin/Marque/Marques.php", [

            "h1" => "Nos Marques",
            "marques" => $marques
        ]);
    }


    public function telephone($id)
    {


        if (!empty($id) && is_numeric($id)) {   

            $tel = new TelephoneRepository;
            $telephones = $tel->findById('telephone', $id);
            $commentaire = new Commentaire;
            $commentaires = $this->commentaireRepository->getCommentaire($commentaire, $id);
            $commentaire->setUtilisateur($commentaires);
            
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
            "telephones" => $telephones,
            "h1" => "Fiche product",
            "commentaire" => $commentaires,
            "errors" => $errors,
            ]);
        }else{
            error("404.php");
        }
    }
}