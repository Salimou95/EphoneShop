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

    public function delete($id){
        if (!empty($id) && is_numeric($id)) {            
            $commentaire = $this->commentaireRepository->findById('commentaire', $id);
            if (empty($commentaire)) {
                $this->setMessage("danger",  "Le commentaire NO $id n'existe pas");
            }else{
                $this->commentaireRepository->remove($commentaire);
                $this->render("Commentaire/commentaire.php", [
                    "commentaire" => $commentaire,
                    "h1" => "Commentaire",
                ]);
                $this->setMessage("success",  "Le commentaire a été supprimer");
                return redirection(addLink("Accueil"));
            }
        }else{
            error("404.php");
        }
    }
    public function udapte($id){
        if (!empty($id) && is_numeric($id)) {            
            $commentaire = $this->commentaireRepository->findById('commentaire', $id);
            if (empty($commentaire)) {
                $this->setMessage("danger",  "Le commentaire NO $id n'existe pas");
                return redirection(addLink("Accueil"));
            }else{
                $this->form->handleUdapteForm($commentaire);
    
                if ($this->form->isSubmitted() && $this->form->isValid()) {
                        $this->commentaireRepository->udapteCommentaire($commentaire);
                        $this->setMessage("success", "Le commentaire a été modifier");
                        return redirection(addLink("Accueil"));
                    }
    
                    $errors = $this->form->getEerrorsForm();
                    $this->render("Commentaire/commentaire.php", [
                    "commentaire" => $commentaire,
                    "h1" => "Modifier votre commentaire",
                    "errors" => $errors
                    ]);
            }
        }else{
            error("404.php");
        }
    }
    

    
}