<?php

namespace Controller\Admin;

use Model\Entity\Marque;
use Model\Repository\MarqueRepository;
use Model\Entity\Telephone;
use Model\Repository\TelephoneRepository;
use Form\TelephoneHandleRequest;
use Service\ImageHandler;
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
    private TelephoneHandleRequest $form;
    private Commentaire $commentaire;
    private CommentaireRepository $commentaireRepository; 
    private CommentaireHandleRequest $commentaireHandleRequest;


    

    public function __construct()
    {
        // $this->$telephone = new Telephone;
        $this->marque = new Marque;
        $this->marqueRepository = new MarqueRepository;
        $this->telephoneRepository = new TelephoneRepository;
        $this->form = new TelephoneHandleRequest;
        $this->commentaire = new Commentaire;
        $this->commentaireRepository = new CommentaireRepository;
        $this->commentaireHandleRequest = new CommentaireHandleRequest;

    }

    // public function list()
    // {
    //     $telephones = $this->telephoneRepository->findAll($this->telephone);

    //     $this->render("Accueil.php", [

    //         "h1" => "Nos téléphones",
    //         "telephones" => $telephones
    //     ]);
    // }

    public function list(){

        if($this->isUserConnected() && $this->getAdmin()){
            $telephone = new Telephone;
            $telephones = $this->telephoneRepository->findAll($telephone);
            $this->render("Admin/Telephone/Telephones.php", [
                "h1" => "Nos téléphones",
                "telephones" => $telephones
            ]);
        }else{
            error(403);
        }
    }

    

    public function addTelephone(){
        if($this->isUserConnected() && $this->getAdmin()){
            $marques = $this->marqueRepository->findAll($this->marque);

            $telephone = new Telephone;
                
                $this->form->handleInsertForm($telephone);
                if ($this->form->isSubmitted() && $this->form->isValid()) {
                    ImageHandler::handelPhoto($telephone);
                    $this->telephoneRepository->addTelephone($telephone);
                    return redirection(addLink("Accueil"));
                }
            $errors = $this->form->getEerrorsForm();
    
            $this->render("Admin/Telephone/formTelephone.php", [
                "h1" => "Ajouter un téléphone",
                "telephone" => $telephone,
                "marques" => $marques,
                "errors" => $errors,
                "mode" => "insertion"
                
            ]);
        }else{
            error(403);
        }
        
    }


    
    

    public function udapteTelephone($id)
    {
        if($this->isUserConnected() && $this->getAdmin()){
            if (!empty($id) && is_numeric($id)) { 
                $marques = $this->marqueRepository->findAll($this->marque);           
                $telephone = $this->telephoneRepository->findById('telephone', $id);
                if (empty($telephone)) {
                    $this->setMessage("danger",  "Le telephone NO $id n'existe pas");
                    // redirection(addLink("home"));
                }
                $this->form->handleEditForm($telephone);
                if ($this->form->isSubmitted() && $this->form->isValid()) {
                    $this->telephonesRepository->udaptetelephones($telephone);
                }

                $errors = $this->form->getEerrorsForm();
                
                $this->render("admin/telephone/FormTelephone.php", [
                "telephone" => $telephone,
                "h1" => "Fiche product",
                "mode"=> "modification"
                ]);
            }else{
                error(403);
            }
        }
    }

    public function deleteTelephone($id){
        if($this->isUserConnected() && $this->getAdmin()){

            if (!empty($id) && is_numeric($id)) {            
                // $tel = new TelephoneRepository;
                $telephones = $this->telephoneRepository->findById('telephone', $id);
                $this->telephoneRepository->remove($telephones);
                if (empty($telephones)) {
                    $this->setMessage("danger",  "Le telephone NO $id n'existe pas");
                }
                $this->render("admin/telephone/FormTelephone.php", [
                    "telephone" => $telephones,
                    "h1" => "Fiche product",
                ]);
                return redirection(addLink("Accueil"));

            }
        }else{
            error(403);
        }
    }


    
}