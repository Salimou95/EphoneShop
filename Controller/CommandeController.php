<?php

namespace Controller;
use Model\Entity\Commande;
use Model\Repository\CommandeRepository;
use Form\CommandeHandleRequest;
use Model\Entity\DetailCommande;
use Model\Repository\DetailCommandeRepository;
use Model\Entity\Telephone;
use Model\Repository\TelephoneRepository;
use Service\Panier;

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

    public function created()
    {
        $panier = $_SESSION["panier"];
        if(!$this->isUserConnected()){
            return redirection(addLink("utilisateur", "connexion"));
        }
        if(empty($_SESSION["panier"]) || !isset($_SESSION["panier"])){
            $this->setMessage("danger",  "Votre panier est vide");
            return redirection(addLink("Accueil"));


        }
        else{
            $this->commandeHandleRequest->handleInsertForm($this->commande);
            if ($this->commandeHandleRequest->isSubmitted() && $this->commandeHandleRequest->isValid()) {
                $idCommande = $this->commandeRepository->createCommande($this->commande);

                foreach ($panier as $value) {   
                    $this->detailCommandeRepository->createDetailCommande($idCommande, $value["telephone"]->getId(), $value["quantite"]);
                    $this->telephoneRepository->updateQuantityTelephone($value["telephone"]->getId(), $value["quantite"]);  
                }
                $this->remove("panier");
                $this->remove("nombre");
                $this->setMessage("success", "Votre commande a été enregistrée");
                redirection(addLink("Accueil"));
            }

            

        }
        $this->render("Commande/FormCommande.php", [

            "h1" => "Commande",
            "panier" => $panier,
            "mode" => "insertion",
        ]);

        
    }
    
    public function read($id)
    {


        if (!empty($id) && is_numeric($id)) {   

            $tel = new TelephoneRepository;
            $telephone = $tel->findById('telephone', $id);
            if(empty($telephone)){
                $this->setMessage("danger",  "Le telephone NO $id n'existe pas");
                redirection(addLink("Accueil"));
            }else{
                $commentaire = new Commentaire;
                $commentaires = $this->commentaireRepository->getCommentaire($commentaire, $id);
                $moyenne = $this->commentaireRepository->moyenneNote($id);
                foreach($commentaires as $comm){
                    $comm->setUtilisateur($comm);
                }
                $this->commentaireHandleRequest->handleInsertForm($commentaire);
                    if ($this->commentaireHandleRequest->isSubmitted() && $this->commentaireHandleRequest->isValid()) {
                        if ($this->isUserConnected()) {            
                            $this->commentaireRepository->addCommentaire($commentaire, $id);
                            $this->setMessage("success",  "Commentaire ajouté avec succcess");
                            return redirection(addLink("telephone","read",$id));
                        }else{
                            $this->setMessage("danger","Vous devez etre connecté pour ajouter un commentaire");
                            return redirection(addLink("Utilisateur","connexion"));
                        }
                        
                    }

        
                $errors = $this->commentaireHandleRequest->getEerrorsForm();
      
                $this->render("telephone/Telephone.php", [
                "telephone" => $telephone,
                "h1" => "Fiche product",
                "commentaires" => $commentaires,
                "errors" => $errors,
                "moyenne" => $moyenne
                ]);

                }
                    }else{
            error(404);
        }
    }

    
   
}