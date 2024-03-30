<?php

namespace Controller\Admin;


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
    public function list()
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
            $this->render("admin/Commentaire/Commentaires.php", [
                "commentaire" => $commentaire,
                "h1" => "Commentaire",
            ]);
        }else{
            error("404.php");
        }
        return redirection(addLink("Accueil"));
    }

    

    
}