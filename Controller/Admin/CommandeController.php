<?php

namespace Controller\Admin;
use Model\Entity\Commande;
use Model\Repository\CommandeRepository;
use Form\CommandeHandleRequest;
use Model\Entity\DetailCommande;
use Model\Repository\DetailCommandeRepository;
use Model\Entity\Telephone;
use Model\Repository\TelephoneRepository;

use Controller\BaseController;


class CommandeController extends BaseController
{
    private Commande $commande;
    private CommandeRepository $commandeRepository;
    private CommandeHandleRequest $commandeHandleRequest;
    private DetailCommande $detailCommande;
    private DetailCommandeRepository $detailCommandeRepository;
    private Telephone $telephone;
    private TelephoneRepository $telephoneRepository;
    
    

    public function __construct()
    {
        $this->commande = new Commande;
        $this->commandeRepository = new CommandeRepository;
        $this->commandeHandleRequest = new CommandeHandleRequest;
        $this->detailCommande = new DetailCommande;
        $this->detailCommandeRepository = new DetailCommandeRepository;
        $this->telephone = new Telephone;
        $this->telephoneRepository = new TelephoneRepository;
    }

    
    public function index()
    {
        if($this->isUserConnected() && $this->getAdmin()){
            $commandes = $this->commandeRepository->findAll($this->commande);
            $this->render("Admin/Commande/Commande.php", [
    
                "h1" => "Les commandes",
                "commandes" => $commandes
                ]);
        }else{
            return error(403);
        }
    }

    
   
}