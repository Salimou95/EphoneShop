<?php

namespace Form;

use Service\Session as Sess;
use Model\Entity\Marque;
use Model\Repository\MarqueRepository;

class MarqueHandleRequest extends BaseHandleRequest
{
    private $marqueRepository;

    public function __construct()
    {
        $this->marqueRepository  = new MarqueRepository;
    }

    public function handleInsertForm(Marque $marque)
    {   
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){


            extract($_POST);
            $errors = []; 
            if(empty($nomMarque)){
                $errors[] = "Veuillez donner un Nom a la marque";
            }
            

            if (empty($errors)) {
                $marque->setNomMarque($nomMarque);
                $marque->setImage($image);

                return $this;
            }
            $this->setEerrorsForm($errors);
            return $this;
        }
    }
    public function handleUdapteForm(Marque $marque)
    {   
      
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){


            extract($_POST);
            $errors = []; 
            if(empty($nomMarque)){
                $errors[] = "Veuillez donner un Nom a la marque";
            }
            

            if (empty($errors)) {
                $marque->setNomMarque($nomMarque);

                return $this;
            }
            $this->setEerrorsForm($errors);
            return $this;
        }
    }

   
}