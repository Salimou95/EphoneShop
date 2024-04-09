<?php

namespace Controller;

use Model\Entity\Telephone;
use Model\Repository\TelephoneRepository;
use Model\Entity\Marque;
use Model\Repository\MarqueRepository;
use Controller\BaseController;

class AccueilController extends BaseController
{
    private TelephoneRepository $telephoneRepository;
    private Telephone $telephone;
    private MarqueRepository $marqueRepository;
    private Marque $marque;

    public function __construct()
    {
        $this->telephoneRepository = new TelephoneRepository;
        $this->telephone = new Telephone;
    }
    public function index()
    {
        $telephones = $this->telephoneRepository->findAll($this->telephone);

        $this->render("Accueil.php", [

            "h1" => "Nos téléphones",
            "telephones" => $telephones
        ]);
    }
}