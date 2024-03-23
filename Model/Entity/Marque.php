<?php

namespace Model\Entity;

class Marque extends BaseEntity{

    private $nomMarque;
    private $logoMarque;
    private $image;
   

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
}