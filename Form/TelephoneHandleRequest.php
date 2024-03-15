<?php

namespace Form;

use Service\Session as Sess;
use Model\Entity\Telephone;
use Model\Repository\TelephoneRepository;

class TelephoneHandleRequest extends BaseHandleRequest
{
    private $telephoneRepository;

    public function __construct()
    {
        $this->telephoneRepository  = new TelephoneRepository;
    }

    public function handleInsertForm(Telephone $telephone)
    {   
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            extract($_POST);
            $errors = [];


            // $userExists = $this->telephoneRepository->checkUserExist($emailUtilisateur);
        

            if (empty($errors)) {
                $telephone->setPrix($prix);
                $telephone->setModele($modele);
                $telephone->setCouleur($couleur);
                $telephone->setSystemeexploitation($systemeexploitation);
                $telephone->setFk_marque($fk_marque);
                $telephone->setRam($ram);
                $telephone->setMemoire($memoire);
                $telephone->setPaysfabrication($paysfabrication);
                $telephone->setDescription($description);
                $telephone->setQuantite($quantite);
                $telephone->setImage($image);
                

                return $this;
            }
            $this->setEerrorsForm($errors);
            return $this;
        }
    }

    public function handleEditForm(Telephone $telephone)
    {
        extract($_POST);
        $errors = [];


        // $userExists = $this->telephoneRepository->checkUserExist($emailUtilisateur);
    

        if (empty($errors)) {
            $telephone->setPrix($prix);
            $telephone->setModele($modele);
            $telephone->setCouleur($couleur);
            $telephone->setSystemeexploitation($systemeexploitation);
            $telephone->setFk_marque($fk_marque);
            $telephone->setRam($ram);
            $telephone->setMemoire($memoire);
            $telephone->setPaysfabrication($paysfabrication);
            $telephone->setDescription($description);
            $telephone->setQuantite($quantite);
            

            return $this;
        }
        $this->setEerrorsForm($errors);
        return $this;
    }
    
}