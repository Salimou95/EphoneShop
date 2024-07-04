<?php

namespace Form;

use Service\Session as Sess;
use Model\Entity\Commande;
use Model\Repository\CommandeRepository;

class CommandeHandleRequest extends BaseHandleRequest
{
    // private $commentaireRepository;

    // public function __construct()
    // {
    //     $this->commentaireRepository  = new CommentaireRepository;
    // }

    public function handleInsertForm(Commande $commande)
    {   
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){


            extract($_POST);
            $errors = []; 
            if(empty($adresse)){
                $errors[] = "Veuillez donner une adresse";
            }
            if(!is_numeric($prix)){
                $errors[] = "Erreur le prix ne peut etre un texte";
            }
            

            if (empty($errors)) {
                $commande->setAdresse($adresse);
                $commande->setPrix($prix);

                return $this;
            }
            $this->setEerrorsForm($errors);
            return $this;
        }
    }

    // public function handleUdapteForm(Commentaire $commentaire)
    // {   
      
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoiecommentaire'])){


    //         extract($_POST);
    //         $errors = []; 
    //         if(empty($note)){
    //             $errors[] = "Veuillez donner une note";
    //         }
    //         if($note <0 || $note > 5){
    //             $errors[] = "Veuillez donner une note entre 0 et 5";
    //         }
            

    //         if (empty($errors)) {
    //             $commentaire->setAvis($avis);
    //             $commentaire->setNote($note);

    //             return $this;
    //         }
    //         $this->setEerrorsForm($errors);
    //         return $this;
    //     }
    // }
   
}