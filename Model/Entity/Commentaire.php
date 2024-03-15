<?php

namespace Model\Entity;

class Commentaire extends BaseEntity{

    private $idCommentaire;
    private $commentaire;
    private $note;
    private $fk_Utilisateur;
    private $fk_Telephone;

    
   


    /**
     * Get the value of idCommentaire
     */ 
    public function getIdCommentaire()
    {
        return $this->idCommentaire;
    }

    /**
     * Set the value of idCommentaire
     *
     * @return  self
     */ 
    public function setIdCommentaire($idCommentaire)
    {
        $this->idCommentaire = $idCommentaire;

        return $this;
    }

    /**
     * Get the value of commentaire
     */ 
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set the value of commentaire
     *
     * @return  self
     */ 
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

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
}