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
    public function index()
    {
        if($this->isUserConnected() && $this->getAdmin()){
            $commentaire = $this->commentaireRepository->findAll($this->commentaire);
            $this->render("Admin/Commentaire/commentaires.php", [

                "h1" => "Les commentaires",
                "commentaire" => $commentaire
            ]);
        }else{
            error(403);
        }
    }

    public function delete($id){
        if($this->isUserConnected() && $this->getAdmin()){

            if (!empty($id) && is_numeric($id)) {            
                $commentaire = $this->commentaireRepository->findById('commentaire', $id);
                if (empty($commentaire)) {
                    $this->setMessage("danger",  "Le commentaire NO $id n'existe pas");
                }else{
                    $this->commentaireRepository->remove($commentaire);
                    $this->render("admin/Commentaire/Commentaires.php", [
                        "commentaire" => $commentaire,
                        "h1" => "Commentaire",
                    ]);
                    $this->setMessage("success", "le commentaire n° $id a été supprimer");
                }
            }

            return redirection(addLinkAdmin("admin","commentaire","index"));
        }else{
            error(403);
            }
        
    }



    
}