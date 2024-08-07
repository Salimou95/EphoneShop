<?php

namespace Model\Entity;

// use Model\Entity\Utilisateur;

class Commande extends BaseEntity{

    private $statut;
    private $dateLivraison;
    private $prix;
    private $adresse;
    private $fkUtilisateurCommande;

    public function __construct()
    {
        $this->statut = EN_ATTENTE;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut($statut = null)
    {
        $this->statut = $statut !== null ? $statut : EN_ATTENTE;

        return $this;
    }

    /**
     * Get the value of dateLivraison
     */ 
    public function getDateLivraison()
    {
        return $this->dateLivraison;
    }

    /**
     * Set the value of dateLivraison
     *
     * @return  self
     */ 
    public function setDateLivraison($dateLivraison)
    {
        $this->dateLivraison = $dateLivraison;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }


    /**
     * Get the value of fk_UtilisateurCommande
     */ 
    public function getFk_UtilisateurCommande()
    {
        return $this->fk_UtilisateurCommande;
    }

    /**
     * Set the value of fk_UtilisateurCommande
     *
     * @return  self
     */ 
    public function setFk_UtilisateurCommande($fk_UtilisateurCommande)
    {
        $this->fk_UtilisateurCommande = $fk_UtilisateurCommande;

        return $this;
    }

    /**
     * Get the value of adresse
     */ 
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */ 
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }
}