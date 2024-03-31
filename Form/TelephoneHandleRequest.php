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


            $modelexiste = $this->telephoneRepository->checkTelephoneExist($modele);

            if ($modelexiste) {
                $errors[] = "Ce modele de téléphone existe deja";
            }
            if(empty($prix) || empty($modele) || empty($couleur) || empty($systemeexploitation) || empty($fk_marque) || empty($ram) || empty($memoire) || empty($paysfabrication) || empty($description) || empty($quantite) || empty($image)){
                $errors[] = "Veuillez remplir tous les champs";
            }
            if (!is_numeric($prix)) {
                $errors[] = "Rentrez un prix valide";
            }
            if (!is_numeric($ram)) {
                $errors[] = "Rentrez une taille de ram valide";
            }
            if (!is_numeric($memoire)) {
                $errors[] = "Rentrez un espace de memoire valide";
            }
            if (!is_numeric($quantite)) {
                $errors[] = "Rentrez une quantité valide";
            }

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
        
        if(empty($prix) || empty($modele) || empty($couleur) || empty($systemeexploitation) || empty($fk_marque) || empty($ram) || empty($memoire) || empty($paysfabrication) || empty($description) || empty($quantite)){
            $errors[] = "Veuillez remplir tous les champs";
        }
        if (!is_numeric($prix)) {
            $errors[] = "Rentrez un prix valide";
        }
        if (!is_numeric($ram)) {
            $errors[] = "Rentrez une taille de ram valide";
        }
        if (!is_numeric($memoire)) {
            $errors[] = "Rentrez un espace de memoire valide";
        }
        if (!is_numeric($quantite)) {
            $errors[] = "Rentrez une quantité valide";
        }

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