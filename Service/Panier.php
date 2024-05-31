<?php

namespace Service;

use Model\Repository\TelephoneRepository;

/**
 * Summary of ProductController
 */
class Panier
{
    private TelephoneRepository $telephoneRepository;

    public function __construct()
    {
        $this->telephoneRepository = new TelephoneRepository;
    }

    public function addArticlePanier($id){
        $quantite = $_GET["qte"] ?? 1;
        $tel = $this->telephoneRepository;
        $telephone = $tel->findById('telephone', $id);

        if(!isset($_SESSION["panier"]))
            $_SESSION["panier"] = [];
        
        $panier = $_SESSION["panier"]; // on récupère ce qu'il y a dans le panier en session

        $telephoneExistantDansLePanier = false;
        foreach ($panier as $indice => $value) {
            if ($telephone->getId() == $value["telephone"]->getId()) {
                $panier[$indice]["quantite"] += $quantite;
                $telephoneexistantDansLePanier = true;
                break;  // pour sortir de la boucle foreach
            }
        }
        
        if (!isset($telephoneexistantDansLePanier)) {
            $panier[] = ["quantite" => $quantite, "telephone" => $telephone];  // on ajoute une value au panier => $panier est un array d'array
        }
        
        $_SESSION["panier"] = $panier;  // je remets $panier dans la session, à l'indice 'panier'
        
        $nb = 0;
        foreach ($panier as $value){
            $nb += $value["quantite"];
        }
        $_SESSION["nombre"] = $nb;
        return $nb;
    }
}