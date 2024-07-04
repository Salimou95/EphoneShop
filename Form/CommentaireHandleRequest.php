<?php

namespace Form;

use Service\Session as Sess;
use Model\Entity\Commentaire;
use Model\Repository\CommentaireRepository;

class CommentaireHandleRequest extends BaseHandleRequest
{
    // private $commentaireRepository;

    // public function __construct()
    // {
    //     $this->commentaireRepository  = new CommentaireRepository;
    // }

    public function handleInsertForm(Commentaire $commentaire)
    {   
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoiecommentaire'])){


            extract($_POST);
            $errors = []; 
            if(empty($note)){
                $errors[] = "Veuillez donner une note";
            }
            if($note <0 || $note > 5){
                $errors[] = "Veuillez donner une note entre 0 et 5";
            }
            if(!is_numeric($note)){
                $errors[] = "Veuillez donner une note valide";
            }
            

            if (empty($errors)) {
                $commentaire->setAvis($avis);
                $commentaire->setNote($note);

                return $this;
            }
            $this->setEerrorsForm($errors);
            return $this;
        }
    }

    public function handleUdapteForm(Commentaire $commentaire)
    {   
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoiecommentaire'])){


            extract($_POST);
            $errors = []; 
            if(empty($note)){
                $errors[] = "Veuillez donner une note";
            }
            if($note <0 || $note > 5){
                $errors[] = "Veuillez donner une note entre 0 et 5";
            }
            

            if (empty($errors)) {
                $commentaire->setAvis($avis);
                $commentaire->setNote($note);

                return $this;
            }
            $this->setEerrorsForm($errors);
            return $this;
        }
    }
   
}