<?php

namespace Controller;


use Model\Entity\Commentaire;
use Model\Repository\CommentaireRepository;
use Form\CommentaireHandleRequest;


use Controller\BaseController;

class CommentaireController extends BaseController
{
    private CommentaireRepository $commentaireRepository;
    private Commentaire $commentaire;
    private CommentaireHandleRequest $form;

    public function __construct()
    {
        $this->commentaireRepository = new CommentaireRepository;
        $this->commentaire = new Commentaire;
        $this->form = new CommentaireHandleRequest;
    }
    public function index()
    {
        $commentaires = $this->commentaireRepository->findAll($this->commentaire);

        $this->render("Admin/Commentaire/commentaires.php", [

            "h1" => "Les commentaires",
            "commentaires" => $commentaires
        ]);
    }

    public function deleteCommentaire($id){
        if (!empty($id) && is_numeric($id)) {            
            $commentaire = $this->commentaireRepository->findById('commentaire', $id);
            $this->commentaireRepository->remove($commentaire);
            if (empty($commentaire)) {
                $this->setMessage("danger",  "Le commentaire NO $id n'existe pas");
            }
            $this->render("Commentaires.php", [
                "commentaire" => $commentaire,
                "h1" => "Commentaire",
            ]);
        }else{
            error("404.php");
        }
        return redirection(addLink("Accueil"));
    }
    public function udapteCommentaire($id){
        if (!empty($id) && is_numeric($id)) {            
            $commentaire = $this->commentaireRepository->findById('commentaire', $id);
            if (empty($commentaire)) {
                $this->setMessage("danger",  "Le commentaire NO $id n'existe pas");
            }
            $this->form->handleUdapteForm($commentaire);

            if ($this->form->isSubmitted() && $this->form->isValid()) {
                    $this->commentaireRepository->udapteCommentaire($commentaire);
                    // return redirection(addLink("Accueil"));

                }

                $errors = $this->form->getEerrorsForm();
            $this->render("Commentaire/commentaire.php", [
                "commentaire" => $commentaire,
                "h1" => "Modifier votre commentaire",
            ]);
        }else{
            error("404.php");
        }
        // return redirection(addLink("Accueil"));
    }
    

    
}