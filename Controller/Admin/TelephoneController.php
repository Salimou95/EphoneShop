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

    public function getTelephone(){

        $telephone = new Telephone;
        $telephones = $this->telephoneRepository->findAll($telephone);

        $this->render("Admin/Telephone/Telephones.php", [

            "h1" => "Nos téléphones",
            "telephones" => $telephones
        ]);
    }

    

    public function addTelephone(){
        if($this->getAdmin()){
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
                "mode" => "insertion"
                
            ]);
        }else{

            error("404.php");
        }
        
    }


    
    // public function udapteTelephone($id)
    // {
    //     if (!empty($id) && is_numeric($id)) {   
            
    //         $marques = $this->marqueRepository->findAll($this->marque);

    //         $telephone = new telephone;
    //         $telephones = $telephone->findById('telephone', $id);

    //         if ($this->form->isSubmitted() && $this->form->isValid()) {
    //                 $this->form->handleEditForm($telephones);
    //                 $this->telephoneRepository->udapteTelephone($telephones);
    //                 return redirection(addLink("Accueil"));
    //             }
    //         $this->render("Admin/Telephone/FormTelephone.php", [
    //         "telephone" => $telephone,
    //         "marque"=>$marques,
    //         "h1" => "Fiche product",
    //         "mode"=>"Modifier"
    //         ]);
    //     } else {
    //         error("404.php");
    //     }
    // }

    // public function udapteTelephone($id)
    // {
    //     if (!empty($id) && is_numeric($id)) {            
    //         // $tel = new TelephoneRepository;
    //         $telephones = $this->telephoneRepository->findById('telephone', $id);
    //         $comm = new Commentaire;
    //         $commentaire = $this->commentaireRepository->getCommentaire($comm, $id);
    //             if (empty($telephones)) {
    //             $this->setMessage("danger",  "Le telephone NO $id n'existe pas");
    //             // redirection(addLink("home"));
    //         }
    //         $this->render("telephone/Telephone.php", [
    //         "telephone" => $telephones,
    //         "h1" => "Fiche product",
    //         "commentaire" => $commentaire
    //         ]);
    //     }else{
    //         error("404.php");
    //     }
    // }


    
}