<?php

namespace Model\Entity;

// use Model\Entity\Utilisateur;

class DetailCommande extends BaseEntity{

    private $fkCommande;
    private $fkTelephone;
    private $quantite;


    /**
     * Get the value of fkCommande
     */ 
    public function getFkCommande()
    {
        return $this->fkCommande;
    }

    /**
     * Set the value of fkCommande
     *
     * @return  self
     */ 
    public function setFkCommande($fkCommande)
    {
        $this->fkCommande = $fkCommande;

        return $this;
    }

    /**
     * Get the value of fkTelephone
     */ 
    public function getFkTelephone()
    {
        return $this->fkTelephone;
    }

    /**
     * Set the value of fkTelephone
     *
     * @return  self
     */ 
    public function setFkTelephone($fkTelephone)
    {
        $this->fkTelephone = $fkTelephone;

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
}