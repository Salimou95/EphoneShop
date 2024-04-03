<?php

namespace Model\Entity;

class Panier extends BaseEntity{

    private $quantitePanier;
    private $fk_UtilisateurPanier;

    /**
     * Get the value of quantitePanier
     */ 
    public function getQuantitePanier()
    {
        return $this->quantitePanier;
    }

    /**
     * Set the value of quantitePanier
     *
     * @return  self
     */ 
    public function setQuantitePanier($quantitePanier)
    {
        $this->quantitePanier = $quantitePanier;

        return $this;
    }

    /**
     * Get the value of fk_UtilisateurPanier
     */ 
    public function getFk_UtilisateurPanier()
    {
        return $this->fk_UtilisateurPanier;
    }

    /**
     * Set the value of fk_UtilisateurPanier
     *
     * @return  self
     */ 
    public function setFk_UtilisateurPanier($fk_UtilisateurPanier)
    {
        $this->fk_UtilisateurPanier = $fk_UtilisateurPanier;

        return $this;
    }
}