<?php

namespace Controller\Admin;


use Model\Entity\Marque;
use Model\Repository\MarqueRepository;
use Form\MarqueHandleRequest;
use Service\ImageHandler;


use Controller\BaseController;

class MarqueController extends BaseController
{
    private MarqueRepository $marqueRepository;
    private Marque $marque;
    private MarqueHandleRequest $form;

    public function __construct()
    {
        $this->marqueRepository = new MarqueRepository;
        $this->marque = new Marque;
        $this->form = new MarqueHandleRequest;
    }
    public function index()
    {
        if($this->isUserConnected() && $this->getAdmin()){

            $marques = $this->marqueRepository->findAll($this->marque);

            $this->render("Admin/Marque/Marques.php", [

                "h1" => "Nos Marques",
                "marques" => $marques
            ]);
        }else{
            error(403);
        }
    }


    public function created(){
        if($this->isUserConnected() && $this->getAdmin()){
                
            $marque = new Marque ;
            $this->form->handleInsertForm($marque);
            if ($this->form->isSubmitted() && $this->form->isValid()) {
                ImageHandler::handelPhoto($marque);
                $this->marqueRepository->addMarque($marque);
                $this->setMessage("sucess", "la marque a été crée");
                return redirection(addLink("marque","index", null, "admin"));
                }
            $errors = $this->form->getEerrorsForm();
    
            $this->render("Admin/Marque/FormMarques.php", [
                "h1" => "Ajouter une marque",
                "marque" => $marque,
                "errors" => $errors
                
            ]);
        }else{

            error(403);
        }


    }

    public function read($id){
        if($this->isUserConnected() && $this->getAdmin()){
            if (!empty($id) && is_numeric($id)) {
                $marque = $this->marqueRepository->findById("marque", $id);
                $this->render("Admin/Marque/FormMarques.php", [
                "h1" => "Modification de la marque n° $id",
                "marque" => $marque,
                ]);
            }
        }else{
            error(403);
        }
    }

    public function update($id){
        if($this->isUserConnected() && $this->getAdmin()){
            if (!empty($id) && is_numeric($id)) {
                $marque = $this->marqueRepository->findById("marque", $id);
                if (empty($marque)){
                    $this->setMessage("danger",  "La marque n° $id n'existe pas");
                }else{
                    $this->form->handleUdapteForm($marque);
                    if ($this->form->isSubmitted() && $this->form->isValid()) {
                        $this->marqueRepository->udapteMarque($marque);
                        $this->setMessage("sucess", "la marque n° $id a été modifier");
                        return redirection(addLink("marque","index", null, "admin"));
                    }
                }
            $errors = $this->form->getEerrorsForm();
            }
            $this->render("Admin/Marque/FormMarques.php", [
                "h1" => "Modification de la marque n° $id",
                "marque" => $marque,
                "mode" => "suppression"
            ]);
        }else{
            error(403);
        }
    }
    public function delete($id)
    {
        if($this->isUserConnected() && $this->getAdmin()){
            if (!empty($id) && is_numeric($id)) {
                $marque = $this->marqueRepository->findById("marque", $id);
                if (empty($marque)){
                    $this->setMessage("danger",  "La marque n° $id n'existe pas");
                }else{
                    $this->marqueRepository->remove($marque);
                  
                    $this->setMessage("sucess", "la marque n° $id a été supprimer");
                    return redirection(addLink("marque","index", null, "admin"));
                }
                $this->render("Admin/Marque/FormMarques.php", [
                    "h1" => "Supression de l'utilisateur n° $id",
                    "marque" => $marque,
                    "mode" => "suppression"
                ]);
            }
        }else{
            error(403);
        }
    }
    
}