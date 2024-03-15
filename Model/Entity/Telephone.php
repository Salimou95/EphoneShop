<?php

namespace Model\Entity;


class Telephone extends BaseEntity{

    private $idTelephone;
    private $prix;
    private $modele;
    private $couleur;
    private $systemeexploitation;
    private $ram;
    private $memoire;
    private $paysfabrication;
    private $description;
    private $quantite;
    private $fk_marque;
    private $image;
    private $fk_utilisateur;

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
     * Get the value of modele
     */ 
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set the value of modele
     *
     * @return  self
     */ 
    public function setModele($modele)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get the value of couleur
     */ 
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     * @return  self
     */ 
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get the value of systemeexploitation
     */ 
    public function getSystemeexploitation()
    {
        return $this->systemeexploitation;
    }

    /**
     * Set the value of systemeexploitation
     *
     * @return  self
     */ 
    public function setSystemeexploitation($systemeexploitation)
    {
        $this->systemeexploitation = $systemeexploitation;

        return $this;
    }

 
    /**
     * Get the value of fk_marque
     */ 
    public function getFk_marque()
    {
        return $this->fk_marque;
    }

    /**
     * Set the value of fk_marque
     *
     * @return  self
     */ 
    public function setFk_marque($fk_marque)
    {
        $this->fk_marque = $fk_marque;

        return $this;
    }



    /**
     * Get the value of idTelephone
     */ 
    public function getIdTelephone()
    {
        return $this->idTelephone;
    }

    /**
     * Set the value of idTelephone
     *
     * @return  self
     */ 
    public function setIdTelephone($idTelephone)
    {
        $this->idTelephone = $idTelephone;

        return $this;
    }

    /**
     * Get the value of ram
     */ 
    public function getRam()
    {
        return $this->ram;
    }

    /**
     * Set the value of ram
     *
     * @return  self
     */ 
    public function setRam($ram)
    {
        $this->ram = $ram;

        return $this;
    }

    /**
     * Get the value of memoire
     */ 
    public function getMemoire()
    {
        return $this->memoire;
    }

    /**
     * Set the value of memoire
     *
     * @return  self
     */ 
    public function setMemoire($memoire)
    {
        $this->memoire = $memoire;

        return $this;
    }

    /**
     * Get the value of paysfabrication
     */ 
    public function getPaysfabrication()
    {
        return $this->paysfabrication;
    }

    /**
     * Set the value of paysfabrication
     *
     * @return  self
     */ 
    public function setPaysfabrication($paysfabrication)
    {
        $this->paysfabrication = $paysfabrication;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */ 
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of fk_utilisateur
     */ 
    public function getFk_utilisateur()
    {
        return $this->fk_utilisateur;
    }

    /**
     * Set the value of fk_utilisateur
     *
     * @return  self
     */ 
    public function setFk_utilisateur($fk_utilisateur)
    {
        $this->fk_utilisateur = $fk_utilisateur;

        return $this;
    }
}