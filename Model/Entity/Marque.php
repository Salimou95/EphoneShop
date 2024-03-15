<?php

namespace Model\Entity;

class Marque extends BaseEntity{

    private $idMarque;
    private $nomMarque;
    private $logoMarque;
   

    /**
     * Get the value of nomMarque
     */ 
    public function getNomMarque()
    {
        return $this->nomMarque;
    }

    /**
     * Set the value of nomMarque
     *
     * @return  self
     */ 
    public function setNomMarque($nomMarque)
    {
        $this->nomMarque = $nomMarque;

        return $this;
    }

    /**
     * Get the value of logoMarque
     */ 
    public function getLogoMarque()
    {
        return $this->logoMarque;
    }

    /**
     * Set the value of logoMarque
     *
     * @return  self
     */ 
    public function setLogoMarque($logoMarque)
    {
        $this->logoMarque = $logoMarque;

        return $this;
    }

    /**
     * Get the value of idMarque
     */ 
    public function getIdMarque()
    {
        return $this->idMarque;
    }

    /**
     * Set the value of idMarque
     *
     * @return  self
     */ 
    public function setIdMarque($idMarque)
    {
        $this->idMarque = $idMarque;

        return $this;
    }
}