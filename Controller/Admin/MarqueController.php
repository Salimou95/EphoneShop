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
                    // return redirection(addLink("Accueil"));
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

    }
    public function update($id){
        if($this->isUserConnected() && $this->getAdmin()){
            if (!empty($id) && is_numeric($id)) {
                $marque = $this->marqueRepository->findById("marque", $id);
                $this->form->handleInsertForm($marque);
                if ($this->form->isSubmitted() && $this->form->isValid()) {
                    $this->marqueRepository->addTelephone($marque);
                    return redirection(addLink("Accueil"));
                }
            $errors = $this->form->getEerrorsForm();
            }
        }
    }
    public function deleteMarque($id)
    {
        if($this->isUserConnected() && $this->getAdmin()){
            if (!empty($id) && is_numeric($id)) {
                $marque = $this->marqueRepository->findById("marque", $id);
    
                $this->marqueRepository->remove($marque);
                
                $this->render("Admin/Marque/FormMarques.php", [
                        "h1" => "Supression de l'utilisateur n° $id",
                        "marque" => $marque,
                        "mode" => "suppression"
                    ]);
                redirection(addLink("Accueil"));
            }
        }else{
            error(403);
        }
    }
    public function marqueUnique($id)
    {


        
    }
}