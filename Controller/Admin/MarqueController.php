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
    public function list()
    {
        $marques = $this->marqueRepository->findAll($this->marque);

        $this->render("Admin/Marque/Marques.php", [

            "h1" => "Nos Marques",
            "marques" => $marques
        ]);
    }


    public function addMarque(){
        if($this->getAdmin()){
                
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

            error("404.php");
        }


    }
    public function marqueUnique($id)
    {

        
    }
}