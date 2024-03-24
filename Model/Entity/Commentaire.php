<?php

namespace Model\Entity;

use Model\Entity\Utilisateur;
class Commentaire extends BaseEntity{

    private $avis;
    private $note;
    private $fk_Utilisateur;
    private $fk_Telephone;
    private Utilisateur $utilisateur;
 

    /**
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of fk_Utilisateur
     */ 
    public function getFk_Utilisateur()
    {
        return $this->fk_Utilisateur;
    }

    /**
     * Set the value of fk_Utilisateur
     *
     * @return  self
     */ 
    public function setFk_Utilisateur($fk_Utilisateur)
    {
        $this->fk_Utilisateur = $fk_Utilisateur;

        return $this;
    }

    /**
     * Get the value of fk_Telephone
     */ 
    public function getFk_Telephone()
    {
        return $this->fk_Telephone;
    }

    /**
     * Set the value of fk_Telephone
     *
     * @return  self
     */ 
    public function setFk_Telephone($fk_Telephone)
    {
        $this->fk_Telephone = $fk_Telephone;

        return $this;
    }

    /**
     * Get the value of avis
     */ 
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Set the value of avis
     *
     * @return  self
     */ 
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get the value of Utilisateur
     */ 
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of Utilisateur
     *
     * @return  self
     */ 
    public function setUtilisateur($commentaire)
    {
        $utilisateur = new Utilisateur;
        $utilisateur->setNomUtilisateur($commentaire->nomUtilisateur);
        $utilisateur->setPrenomUtilisateur($commentaire->prenomUtilisateur);

        
        $this->utilisateur = $utilisateur;
        return $commentaire;
    }
}