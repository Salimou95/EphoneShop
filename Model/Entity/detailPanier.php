<?php

namespace Model\Entity;

class detailPanier extends BaseEntity{

    private $fk_panierRelation ;
    private $fk_telephoneRelation;

   

    /**
     * Get the value of fk_panierRelation
     */ 
    public function getFk_panierRelation()
    {
        return $this->fk_panierRelation;
    }

    /**
     * Set the value of fk_panierRelation
     *
     * @return  self
     */ 
    public function setFk_panierRelation($fk_panierRelation)
    {
        $this->fk_panierRelation = $fk_panierRelation;

        return $this;
    }

    /**
     * Get the value of fk_telephoneRelation
     */ 
    public function getFk_telephoneRelation()
    {
        return $this->fk_telephoneRelation;
    }

    /**
     * Set the value of fk_telephoneRelation
     *
     * @return  self
     */ 
    public function setFk_telephoneRelation($fk_telephoneRelation)
    {
        $this->fk_telephoneRelation = $fk_telephoneRelation;

        return $this;
    }
}