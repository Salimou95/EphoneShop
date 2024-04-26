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
            $commentaires = $this->commentaireRepository->findAll($this->commentaire);
            $this->render("Admin/Commentaire/commentaires.php", [

                "h1" => "Les commentaires",
                "commentaires" => $commentaires
            ]);
        }else{
            error(403);
        }
    }

    public function delete($id){
        if($this->isUserConnected() && $this->getAdmin()){

            if (!empty($id) && is_numeric($id)) {            
                $commentaires = $this->commentaireRepository->findById('commentaire', $id);
                if (empty($commentaires)) {
                    $this->setMessage("danger",  "Le commentaire NO $id n'existe pas");
                }else{
                    $this->render("admin/Commentaire/Commentaires.php", [
                        "commentaires" => $commentaires,
                        "h1" => "Commentaire",
                    ]);
                    $this->commentaireRepository->remove($commentaires);
                    $this->setMessage("success", "le commentaire n° $id a été supprimer");
                    return redirection(addLink("commentaire","index",null,"admin"));
                }
            }

        }else{
            error(403);
            }
        
    }



    
}